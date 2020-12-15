<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Projetos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('projetos_m');
        $this->template
            ->add_css('css/projetos')
            ->add_js('js/projetos');
    }

    public function index()
    {
        $items = $this->projetos_m->get();
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
        $item = $this->projetos_m->get(array('id' => $id));

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
            $response = $this->projetos_m->insert($data);

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
            $response = $this->projetos_m->update($data);

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

        $response = $this->projetos_m->delete($id);
        redirect('projetos');
    }
}
