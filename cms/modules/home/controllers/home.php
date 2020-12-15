<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class home extends MY_Controller
{

  public function index()
  {
    $this->load->model('projetos/projetos_m');
    $this->load->model('contato/contato_m');

    $items = $this->projetos_m->get(array('limit' => 5));

    $counts = array(
      'contacts' => $this->contato_m->get(array('count' => TRUE)),
    );

    $this->template
      ->add_css('css/home')
      ->add_js('js/home')
      ->set('items', $items)
      ->set('data', $counts)
      ->build('home');
  }
}
