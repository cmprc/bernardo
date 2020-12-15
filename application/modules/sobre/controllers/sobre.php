<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Sobre extends MY_Controller
{
  public function __construct($isRun = FALSE)
  {
    parent::__construct($isRun);
    $this->load->model(PATH_TO_MODEL . 'blocos/models/blocos_m');
  }

  public function index()
  {
    $blocks = $this->blocos_m->get(array('page' => 'Sobre'));

    $this->template
      ->add_css('css/sobre')
      ->add_js('js/sobre')
      ->set('blocks', $blocks)
      ->build('sobre');
  }
}
