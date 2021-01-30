<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Configuracoes extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('configuracoes_m');
    $this->template
      ->add_css('css/configuracoes')
      ->add_js('js/configuracoes');
  }

  public function index()
  {
    $this->edit(1);
  }

  public function edit($id)
  {
    $id || show_404();
    $item = $this->configuracoes_m->get(array('id' => $id));

    $this->template
      ->set('item', $item)
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
    $this->form_validation->set_rules('instagram', 'Instagram', 'prep_url|trim');
    $this->form_validation->set_rules('linkedin', 'Linkedin', 'prep_url|trim');
    $this->form_validation->set_rules('behance', 'Behance', 'prep_url|trim');

    if ($this->form_validation->run() !== FALSE) {
      $response = $this->configuracoes_m->update($data);

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
