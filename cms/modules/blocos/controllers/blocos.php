<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Blocos extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('blocos_m');
    $this->template
      ->add_css('css/blocos')
      ->add_js('js/blocos');
  }

  public function index()
  {
    $items = $this->blocos_m->get();
    $this->template
      ->set('items', $items)
      ->build('listagem');
  }

  public function add()
  {
    $user = $this->session->userdata('user');
    if(!$user->admin){
      redirect('blocos');
    }

    $this->template
      ->build('formulario');
  }

  public function edit($id)
  {
    $id || show_404();
    $item = $this->blocos_m->get(array('id' => $id));

    $this->template
      ->set('item', $item)
      ->build('formulario');
  }

  public function insert()
  {
    $data = $this->input->post();

    if (!$data) {
      show_404();
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('page', 'Página', 'trim|required');
    $this->form_validation->set_rules('section', 'Seção', 'trim|required');
    $this->form_validation->set_rules('title', 'Título', 'trim');
    $this->form_validation->set_rules('subtitle', 'Subtítulo', 'trim');
    $this->form_validation->set_rules('text', 'Texto', 'trim');
    $this->form_validation->set_rules('link', 'Link', 'prep_url');

    if ($this->form_validation->run() !== FALSE) {

      if (isset($data['image'])) {
        $image = $data['image'];

        $image = json_decode($image);
        $path = dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . '..' . DS . 'userfiles' . DS . 'blocos' . DS;
        $new_name = uniqid() . '.' . pathinfo($image->name, PATHINFO_EXTENSION);

        file_put_contents($path . $new_name, base64_decode($image->data));
        $data['image'] = $new_name;
      }

      $response = $this->blocos_m->insert($data);

      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('status' => $response)));
    } else {
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('status' => FALSE, 'response' => $this->form_validation->error_array())));
    }
  }

  public function update()
  {
    $data = $this->input->post();
    if (!$data) {
      show_404();
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('id', 'ID', 'required');
    $this->form_validation->set_rules('page', 'Página', 'trim|required');
    $this->form_validation->set_rules('section', 'Seção', 'trim|required');
    $this->form_validation->set_rules('title', 'Título', 'trim');
    $this->form_validation->set_rules('subtitle', 'Subtítulo', 'trim');
    $this->form_validation->set_rules('text', 'Texto', 'trim');
    $this->form_validation->set_rules('link', 'Link', 'prep_url');

    if ($this->form_validation->run() !== FALSE) {
        $image = isset($_FILES['image']) ? $_FILES['image'] : FALSE;
        if($image && !empty($image['name'])){
            $image = $this->_do_upload('image', '../userfiles/blocos', 'blocos_m');
            $data['image'] = reset($image);
        }

        $response = $this->blocos_m->update($data);

      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('status' => $response)));
    } else {
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('status' => FALSE, 'response' => $this->form_validation->error_array())));
    }
  }

  public function delete($id)
  {
    if (!$id) {
      show_404();
    }

    $response = $this->blocos_m->delete($id);
    redirect('blocos');
  }
}
