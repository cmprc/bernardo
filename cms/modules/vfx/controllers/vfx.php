<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Vfx extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('vfx_m');
        $this->template
            ->add_css('css/vfx')
            ->add_js('js/vfx');
    }

    public function index()
    {
        $items = $this->vfx_m->get();
        $this->template
            ->set('items', $items)
            ->build('listagem');
    }

    public function add()
    {
        $this->template
            ->build('formulario');
    }

    public function edit($id)
    {
        $id || show_404();
        $item = $this->vfx_m->get(array('id' => $id));

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

        $this->form_validation->set_rules('name', 'Nome do Projeto', 'required');
        $this->form_validation->set_rules('text', 'Apresentação do Projeto', 'trim');
        $this->form_validation->set_rules('youtube_link', 'Link do Youtube', 'prep_url');

        if ($this->form_validation->run() !== FALSE) {
            $response = $this->vfx_m->insert($data);

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

        $this->form_validation->set_rules('id', 'ID do Projeto', 'required');
        $this->form_validation->set_rules('name', 'Nome do Projeto', 'required');
        $this->form_validation->set_rules('text', 'Apresentação do Projeto', 'trim');
        $this->form_validation->set_rules('youtube_link', 'Apresentação do Projeto', 'prep_url');

        if ($this->form_validation->run() !== FALSE) {
            $response = $this->vfx_m->update($data);

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

        $response = $this->vfx_m->delete($id);
        redirect('vfx');
    }
}
