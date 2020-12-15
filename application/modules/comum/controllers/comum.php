<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Comum extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    set_status_header(404);
    $this->template->add_css('css/error_404', 'comum')
      ->build('comum/not_found');
  }

  public function change_mode($type = 'desktop')
  {
    if ($type == 'desktop') {
      $this->session->set_userdata('force_desktop', TRUE);
      redirect(site_url());
    } else {
      $this->session->set_userdata('force_desktop', FALSE);
      redirect(site_url());
    }
  }
}

/* End of file comum.php */
/* Location: ./application/controllers/comum.php */
