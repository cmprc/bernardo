<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Home extends MY_Controller
{
  public function __construct($isRun = FALSE)
  {
    parent::__construct($isRun);
    $this->load->model(PATH_TO_MODEL . 'blocos/models/blocos_m');
  }

  public function index()
  {
    $block = $this->blocos_m->get(array('where' => array('page' => 'Home')));

    $this->template
      ->add_css('css/' . $this->prefix . 'home')
      ->add_js('js/' . $this->prefix . 'home')
      ->set('block', reset($block))
      ->build('home');
  }
}
