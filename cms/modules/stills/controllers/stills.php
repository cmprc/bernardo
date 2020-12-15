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

        $images = $this->stills_m->get_images(array('id' => $id));
        if (!empty($images)) {
            $images = array_map(function ($item) {
                return (object) array(
                    'source' => $item->file_name,
                    'options' => array(
                        'type' => 'local',
                    )
                );
            }, $images);

            $this->template->set('images', json_encode($images));
        }

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

            // if (isset($data['images'])) {
            //     $images = $data['images'];

            //     $array = array();
            //     foreach ($images as $image) {
            //         $image = json_decode($image);
            //         $path = dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . '..' . DS . 'userfiles' . DS . 'stills' . DS;
            //         $new_name = uniqid() . '.' . pathinfo($image->name, PATHINFO_EXTENSION);

            //         file_put_contents($path . $new_name, base64_decode($image->data));
            //         $array['images'][] = $new_name;
            //     }

            //     $data['images'] = $array;
            // }


            $images = $_FILES['images'];
            foreach ($images as $key => $item) {
            }

            $response = $this->stills_m->insert($data);

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
            $response = $this->stills_m->update($data);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => $response)));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => FALSE, 'response' => $this->form_validation->error_array())));
        }
    }

    public function upload_image()
    {
        $config['upload_path'] = dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . '..' . DS . 'userfiles' . DS . 'stills' . DS;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;

        $this->load->library('upload', $config);

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
