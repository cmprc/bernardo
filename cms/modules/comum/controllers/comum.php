<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Comum extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        show_404();
    }

    public function crop_image()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('image', 'Imagem', 'trim|required');
        $this->form_validation->set_rules('image_width', 'Largura da Imagem', 'trim|required');
        $this->form_validation->set_rules('image_height', 'Altura da Imagem', 'trim|required');
        $this->form_validation->set_rules('crop_width', 'Largura do Corte', 'trim|required');
        $this->form_validation->set_rules('crop_height', 'Altura do Corte', 'trim|required');
        $this->form_validation->set_rules('crop_x', 'Posição Horizontal do Corte', 'trim|required');
        $this->form_validation->set_rules('crop_y', 'Posição Vertical do Corte', 'trim|required');

        if ($this->form_validation->run() === true && is_file($this->input->post('image'))){
            $this->load->library('WideImage');

            $img = $this->input->post('image');
            $img_w = $this->input->post('image_width');
            $img_h = $this->input->post('image_height');
            $crop_w = $this->input->post('crop_width');
            $crop_h = $this->input->post('crop_height');
            $crop_x = $this->input->post('crop_x');
            $crop_y = $this->input->post('crop_y');

            if (!$crop_w || !$crop_h)
                $data = array(
                    'status' => false,
                    'classe'=> 'error',
                    'message' => 'A área de recorte não foi especificada.'
                );
            else{

                $size = getimagesize($img);
                $ori_w = $size[0];
                $ori_h = $size[1];

                $ratio = $ori_h / $img_h;

                $this->wideimage
                    ->load($img)
                    ->crop(floor($crop_x * $ratio), floor($crop_y * $ratio), floor($crop_w * $ratio), floor($crop_h * $ratio))
                    ->saveToFile($img);

                $data = array(
                    'status' => true,
                    'classe'=> 'success',
                    'image' => site_url('image/resize_crop?src=' . $img . '&w=170&h=170&i=1'),
                    'message' => 'O recorte foi aplicado com sucesso'
                );
            }

        }else{
            $data = array(
                'status' => false,
                'classe'=> 'error',
                'message' => 'Ocorreu um erro no recorte da imagem'
            );
        }

        echo json_encode($data);
    }

}

/* End of file comum.php */
/* Location: ./application/controllers/comum.php */
