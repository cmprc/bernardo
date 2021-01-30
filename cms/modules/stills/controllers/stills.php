<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Stills extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('stills_m');
        $this->template
            ->add_css('css/stills')
            ->add_js('js/stills');
    }

    public function index()
    {
        $items = $this->stills_m->get();
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
        $item = $this->stills_m->get(array('id' => $id));
        $item->images = $this->stills_m->get_images(array('id' => $id));

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

        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('link', 'Link', 'prep_url');

        if ($this->form_validation->run() !== FALSE) {
            $images = isset($_FILES['images']) ? $_FILES['images'] : FALSE;

            $response = $this->stills_m->insert($data);
            if($response && $images && !empty($images['name'])){
                $images = $this->_do_upload('images', '../userfiles/stills', 'stills_m', $response);
                $response = $images ? TRUE : FALSE;
            }

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
        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('link', 'Link', 'prep_url');

        if ($this->form_validation->run() !== FALSE) {
            $images = isset($_FILES['images']) ? $_FILES['images'] : FALSE;

            $response = $this->stills_m->update($data);
            if($response && $images && !empty($images['name']) && reset($images['name']) != ""){
                $images = $this->_do_upload('images', '../userfiles/stills', 'stills_m', $response);
                $response = $images ? TRUE : FALSE;
            }

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

        $response = $this->stills_m->delete($id);
        redirect('stills');
    }
}
