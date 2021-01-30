<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Stills extends MY_Controller
{
    public function __construct($isRun = FALSE)
    {
        parent::__construct($isRun);
        $this->load->model(PATH_TO_MODEL . 'stills/models/stills_m');
    }

    public function index()
    {
        $stills = $this->stills_m->get();

        $this->template
             ->add_css('css/stills')
             ->add_js('js/stills')
             ->set('stills', $stills)
             ->build('stills');
    }
}
