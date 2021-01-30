<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Vfx extends MY_Controller
{
    public function __construct($isRun = FALSE)
    {
        parent::__construct($isRun);
        $this->load->model(PATH_TO_MODEL . 'vfx/models/vfx_m');
    }

    public function index()
    {
        $videos = $this->vfx_m->get();

        $this->template
            ->add_css('css/vfx')
            ->add_js('js/vfx')
            ->set('videos', $videos)
            ->build('vfx');
    }
}
