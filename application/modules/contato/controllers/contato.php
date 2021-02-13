<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Contato extends MY_Controller
{
    public function __construct($isRun = FALSE)
    {
        parent::__construct($isRun);
        $this->load->model(PATH_TO_MODEL . 'contato/models/contato_m');
    }

    public function add_contact()
    {
        $data = $this->input->post();
        if (!$data) {
            return false;
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required');
        $this->form_validation->set_rules('subject', 'Assunto', 'trim|required');
        $this->form_validation->set_rules('message', 'Mensagem', 'trim|required');

        if ($this->form_validation->run() !== FALSE) {
            $added = $this->contato_m->insert($data);

            if ($added) {
                $response = array(
                    'status' => TRUE,
                    'message' => 'Mensagem enviada com sucesso!',
                );
            } else {
                $response = array(
                    'status' => FALSE,
                    'message' => 'Ocorreu um erro. Tente novamente mais tarde.',
                );
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

    public function index()
    {
        $this->template
            ->add_css('css/contato')
            ->add_js('js/contato')
            ->build('contato');
    }
}
