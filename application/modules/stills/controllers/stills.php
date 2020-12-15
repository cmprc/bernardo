<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Stills extends MY_Controller
{
    public function __construct($isRun = FALSE)
    {
        parent::__construct($isRun);
    }

    public function index()
    {
        $this->template
             ->add_css('css/stills')
             ->add_js('js/stills')
             ->build('stills');
    }
}
