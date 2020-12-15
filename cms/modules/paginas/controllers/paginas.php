<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Paginas extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('paginas_m');
    $this->template
      ->add_css('css/paginas')
      ->add_js('js/paginas');
  }

  public function index()
  {
    $this->edit(1);
  }

  public function edit($id)
  {
    $id || show_404();
    $pages = $this->paginas_m->get();

    $this->template
      ->set('pages', $pages)
      ->build('formulario');
  }

  public function update()
  {
    $data = $this->input->post();
    if (!$data) {
      show_404();
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('id', 'ID do Proprietário', 'required');
    $this->form_validation->set_rules('name', 'Nome do Proprietário', 'required');
    $this->form_validation->set_rules('email', 'Email do Proprietário', 'required');

    if ($this->form_validation->run() !== FALSE) {
      $response = $this->Paginas_m->update($data);

      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('status' => $response)));
    } else {
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('status' => FALSE, 'response' => $this->form_validation->error_array())));
    }
  }

}
