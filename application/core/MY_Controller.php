<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package CodeIgniter
 * @author  ExpressionEngine Dev Team
 * @copyright  Copyright (c) 2006, EllisLab, Inc.
 * @license http://codeigniter.com/user_guide/license.html
 * @link http://codeigniter.com
 * @since   Version 2.1.4
 * @filesource
 */

// --------------------------------------------------------------------

/**
 * CodeIgniter MY_Controller
 *
 * Controller principal da aplicação.
 *
 * @package     CodeIgniter
 * @author      Ezoom
 * @subpackage  Controllers
 * @category    Controllers
 * @link        http://ezoom.com.br
 * @copyright  Copyright (c) 2008, Ezoom
 * @version 1.0.0
 *
 */
class MY_Controller extends MX_Controller
{

    protected $class;
    protected $module;
    protected $method;
    protected $prefix;
    protected $currentDbRoute;
    protected $isRun;
    protected $sendTo = array();
    protected $i18n = array();

    public function __construct($isRun = FALSE)
    {
        parent::__construct();
        $this->isRun = $isRun;

        $this->class = $this->router->fetch_class();
        $this->module = $this->router->fetch_module();
        $this->method = $this->router->fetch_method();

        //Carrega o template
        $this->load->library('template');

        $this->load->model('comum/comum_m');
        $this->load->model(PATH_TO_MODEL . 'paginas/models/paginas_m');
        $this->load->model(PATH_TO_MODEL . 'configuracoes/models/configuracoes_m');

        if (!$this->isRun) {

            $this->load->helper('lazyload');

            if (!$this->input->is_ajax_request()) {

                $this->template
                    ->set('class', $this->class)
                    ->set('module', $this->module)
                    ->set('version', 'v=' . $this->config->item('version'))
                    ->set('csrf_test_name', $this->security->get_csrf_hash());

                $page = $this->paginas_m->get(array('slug' => $this->module));
                if (empty($page)) {
                    $page = (object) array(
                        'title' => 'Bernardo Mottim',
                        'meta_description' => 'Website pessoal elaborado para expressar meu trabalho e criar novas parcerias.',
                        'keywords' => 'wbsite, personal website, portfolio, videomaker, pessoal, parceria, trabalho, photos, stills, projects, projetos',
                    );
                }

                $configs = $this->configuracoes_m->get(array('id' => 1));

                $this->template
                    ->set_partial('header', 'header', 'comum')
                    ->set('page', $page)
                    ->set('configs', $configs);

                if ($this->module != 'home') {
                    $this->template->set_partial('footer', 'footer', 'comum');
                }
            }
        }
    }

    protected function fix_slug($value)
    {
        return str_replace('_', '-', $value);
    }
}
