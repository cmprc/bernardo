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

class MY_Controller extends MX_Controller
{
    protected $title;
    protected $filter;
    protected $module;
    protected $method;
    protected $class;
    protected $current_lang;
    protected $current_module;
    protected $view;
    protected $slug;
    protected $model;

    public function __construct()
    {
      parent::__construct();

        //Carrega o template
        $this->load->library('template');

        $this->title = SITE_NAME;

        $this->load->helper('language');
        $this->load->helper('url');

        $this->lang->load('default');

        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->method = $this->router->fetch_method();
        $this->current_module = $this->auth->get_current_module();

        $this->slug = $this->module == $this->class
                    ? str_replace('_', '-', $this->module)
                    : str_replace('_', '-', $this->module.'/'.$this->class);

        //Carrega a pasta language de cada module, quando existe
        $this->lang->load($this->module.'/default');

        // Carregamento de plugins padrões
        $this->load_default();
    }

    public function load_default()
    {
        /**
         * Verifica se a requisição não é ajax
         * X-Requested-With: XMLHttpRequest
         */
        if (!$this->input->is_ajax_request()) {

            // Mantem sessão flashdata
            if ($this->current_module)
                $this->session->keep_filter(array($this->current_module->slug));

            $logo = 'userfiles' . DS . 'logo.png';
            if (!file_exists($logo)) {
                $logo = false;
            }

            $this->template
                 ->set('lang', $this->current_lang)
                 ->set('logo', $logo)
                 ->set('title', 'Dashboard')
                 ->set('module', $this->module)
                 ->set('class', $this->class)
                 ->set('method', $this->method)
                 ->set('slug', $this->slug)
                 ->set('order_by', $this->session->flashdata('order_by'))
                 ->set('current_module', $this->current_module)
                 ->set_partial('header', 'header', 'comum')
                 ->set_partial('sidebar', 'sidebar', 'comum');
                //  ->set_partial('footer', 'footer', 'comum');
        }
    }

    public function search(){
      $data = $this->input->post();

      if($this->module != 'home'){
        $this->load->model("{$this->module}_m", 'model_module');
        $items = $this->model_module->get(array('search' => $data['search']));

        $this->template
          ->set('search', $data['search'])
          ->set('items', $items)
          ->build('listagem');
      }
      else{
        redirect('home');
      }
    }

}
