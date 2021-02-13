<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Login extends MY_Controller
{
  public function __construct()
  {
    $this->load->helper('cookie');
    parent::__construct();
  }

  public function index()
  {
    // echo password_hash('admin', PASSWORD_BCRYPT);
    // die(1);

    if ($this->auth->logged() == true) {
      redirect('home', 'location');
    }

    $this->template
      ->add_css('css/login')
      ->add_js('js/login')
      ->set('title', SITE_NAME . ' - Login')
      ->set_partial('header', '')
      ->set_partial('footer', '')
      ->build('login');
  }

  public function auth()
  {
    $cookie = get_cookie('try_login', TRUE);
    if ($cookie <= 15) {
      $post = $this->input->post();

      if ($this->auth->login($post['password'])) {
        delete_cookie('try_login');

        $response = array(
          'status' => true,
          'classe' => 'success',
          'message' => 'Login efetuado com sucesso!',
        );
      } else {

        $cookie = empty($cookie) ? 1 : ($cookie + 1);
        set_cookie('try_login', $cookie, 600);

        $response = array(
          'status' => false,
          'classe' => 'error',
          'message' => 'Usuário ou senha inválidos'
        );
      }
    } else {
      $response = array(
        'status' => false,
        'classe' => 'error',
        'message' => 'Usuário bloqueado por excesso de tentativas!'
      );
    }

    echo json_encode($response);
  }

  public function logout()
  {
    if ($this->auth->logout()) {
      redirect('login', 'location');
    }
  }
}
