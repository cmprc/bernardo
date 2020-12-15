<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Projetos extends MY_Controller
{
    public function __construct($isRun = FALSE)
    {
        parent::__construct($isRun);
        $this->load->model(PATH_TO_MODEL . 'projetos/models/projetos_m');
    }

    public function index()
    {
        $videos = $this->projetos_m->get();

        $this->template
            ->add_css('css/projetos')
            ->add_js('js/projetos')
            ->set('videos', $videos)
            ->build('projetos');
    }
}
