<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Contato extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('contato_m');
    $this->template
      ->add_css('css/contato')
      ->add_js('js/contato');
  }

  public function index()
  {
    $items = $this->contato_m->get();
    $this->template
      ->set('items', $items)
      ->build('listagem');
  }

  public function open()
  {
    $id = $this->input->post('id');
    if (!$id) {
      return false;
    }

    $item = $this->contato_m->get(array('id' => $id));

    $this->load->view('modal', array('item' => $item));
  }

  public function delete($id)
  {
    if (!$id) {
      show_404();
    }

    $response = $this->contato_m->delete($id);
    redirect('contato');
  }

  public function export()
  {
    $results = $this->contato_m->export();

    $fields_cnt = $results['fields_cnt'];
    $result = $results['result'];

    $schema_insert = '';
    foreach ($fields_cnt as $key => $value) {
      $list = '"' . str_replace(
        '"',
        "\\" . '"',
        stripslashes($value)
      ) . '"';
      $schema_insert .= $list;
      $schema_insert .= ";";
    }
    $out = trim(substr($schema_insert, 0, -1));
    $out .= "\n";

    $totalFields = count($fields_cnt);

    foreach ($result as $key => $row) {
      $schema_insert = '';
      foreach ($fields_cnt as $k => $value) {
        if ($row->$value == '0' || $row->$value != '') {
          if ('"' == '') {
            $schema_insert .= mb_convert_encoding($row->$value, 'utf-16', 'utf-8');
          } else {
            $schema_insert .= '"' .
              str_replace('"', "\\" . '"', mb_convert_encoding($row->$value, 'utf-16', 'utf-8')) . '"';
          }
        } else {
          $schema_insert .= '';
        }
        if ($k < $totalFields - 1) {
          $schema_insert .= ";";
        }
      }
      $out .= $schema_insert;
      $out .= "\n";
    }

    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Length: " . strlen($out));
    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=contatos-" . date('d-m-Y') . ".csv");
    echo $out;
    exit;
  }
}
