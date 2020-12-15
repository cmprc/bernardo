<?php (defined('BASEPATH')) or exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      ExpressionEngine Dev Team
 * @copyright   Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license     http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Auth Class
 *
 * Classe para controle do login e permissões
 *
 * @package    CodeIgniter
 * @subpackage  Auth
 * @category    Libraries
 * @author      Fábio Augustin Neis
 * @link
 */
class Auth
{
  private $ci;
  private $login_controller = 'login';
  private $dashboard_controller = 'home';

  private $auth = '';
  private $session_var = 'user_data';

  protected $currentModule;
  protected $sessionPermissions;
  protected $sessionModules;
  protected $module;
  protected $method;
  protected $class;

  //Classes que não devem validar login
  private $freepass = array(
    'login',
    'esqueci',
    'images',
  );

  public function __construct()
  {
    //Registra no log a inicialização da library
    log_message('debug', 'Initial Auth Library');

    $this->ci = &get_instance();
    $this->ci->load->helper('url');

    //Recupera da sessão os dados do usuário
    $this->auth = $this->ci->session->userdata('user');

    //Pega informações da área acessada
    $this->module = $this->ci->router->fetch_module();
    $this->class = $this->ci->router->fetch_class();
    $this->method = $this->ci->router->fetch_method();

    //Verifica se deve executar a validação de login
    if (in_array($this->class, $this->freepass)) {
      return;
    } elseif (empty($this->auth)) {
      /**
       * Verifica se a requisição não é ajax
       * X-Requested-With: XMLHttpRequest
       */
      if (!$this->ci->input->is_ajax_request()) {
        //Pega página atual
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->ci->session->set_userdata(array('redirect' => $actual_link));

        redirect($this->login_controller);
      } else {
        set_status_header(401);
      }
    }
  }

  public function login($pass)
  {
    $this->ci->load->library('PasswordHash');
    $res = false;

    $this->ci->db
      ->select('*')
      ->from('cfr_user')
      ->where('status', 1)
      ->where('deleted', null);
    // ->limit(1);
    $query = $this->ci->db->get();
    $users = $query->result();

    foreach ($users as $user) {
      if ($this->ci->passwordhash->CheckPassword($pass, $user->password)) {
        //Remove a senha para não salvar em sessão
        unset($user->password);

        $this->auth = $user;
        $this->ci->session->set_userdata('user', $this->auth);

        $this->ci->db->where('id', $user->id);
        $this->ci->db->update('cfr_user', array('last_access' => date('Y-m-d H:i:s'), 'online' => 1));

        $res = true;
        return $res;
      }
    }

    return $res;
  }

  public function logged()
  {
    return $this->auth;
  }

  public function logout()
  {
    $this->ci->db->where('id', $this->session->data);
    $this->ci->db->update('cfr_user', array('online' => 0));

    $this->ci->session->set_userdata('user', '');
    $this->auth = '';

    return true;
  }

  public function get_freepass()
  {
    return $this->freepass;
  }

  public function get_current_module()
  {
    return $this->currentModule;
  }

  public function set_userdata($values)
  {
    $res = false;

    if (is_array($values)) {
      foreach ($values as $key => $value) {
        $this->auth->{$key} = $value;
      }
      $this->ci->session->set_userdata($this->session_var, $this->auth);
      $res = true;
    }

    return $res;
  }
}
