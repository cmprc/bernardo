<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Contato_m extends MY_Model
{
  public $table = 'site_contact';
  public $primary_key = 'id';

  public function get($params = array())
  {
    $options = array(
      'search' => FALSE,
      'offset' => FALSE, // A partir de qual row retornar
      'limit' => FALSE, // Quantidade de rows a retornar
      'order_by' => FALSE, // Ordenação das colunas
      'count' => FALSE, // TRUE para trazer apenas a contagem / FALSE para trazer os resultados
      'id' => FALSE, // Trazer apenas um registro específico pelo id
      'where' => FALSE, // Array especifico de where
    );
    $params = array_merge($options, $params);

    if ($params['count']) {
      $this->db->select('COUNT(DISTINCT ' . $this->table . '.id) AS count');
    } else {
      $this->db->select($this->table . '.*');
      $this->db->select("DATE_FORMAT($this->table.created, '%d.%m.%Y às %H:%i:%s') as date_formatted", false);

      if ($params['search']) {
        $this->db
          ->like("$this->table.name", $params['search'], 'both')
          ->or_like("$this->table.email", $params['search'], 'both')
          ->or_like("$this->table.subject", $params['search'], 'both')
          ->or_like("$this->table.message", $params['search'], 'both');
      }

      if ($params['limit'] !== FALSE && $params['offset'] === FALSE) {
        $this->db->limit($params['limit']);
      } elseif ($params['limit'] !== FALSE) {
        $this->db->limit($params['limit'], $params['offset']);
      }

      if ($params['id']) {
        $this->db->where($this->table . '.id', $params['id']);
      }

      if ($params['order_by']) {
        $this->db->order_by($params['order_by']);
      } else {
        $this->db->order_by($this->table . '.id', 'asc');
      }
    }

    $this->db->from($this->table);

    $query = $this->db->get();

    if ($params['id']) {
      return $query->row();
    }
    else if($params['count']){
      return $query->row()->count;
    }

    return $query->result();
  }

  public function insert($data)
  {
    $insert = $data;

    $this->db->trans_start();
    $this->db->insert($this->table, $insert);
    $this->db->trans_complete();

    return $this->db->trans_status();
  }

  public function delete($id)
  {
    $this->db->trans_start();
    $this->db
      ->where('id', $id)
      ->delete($this->table);
    $this->db->trans_complete();

    return $this->db->trans_status();
  }

  public function export()
  {
    $query = $this->db
      ->select('name AS Nome, email AS Email, subject AS Assunto, message AS Mensagem, DATE_FORMAT(created, "%d/%m/%Y às %H:%i:%s") as Data', FALSE)
      ->from($this->table)
      ->where('deleted', null);

    $query = $this->db->get();

    $return = array(
      'fields_cnt' => $query->list_fields(),
      'result'     => $query->result()
    );

    return $return;
  }
}
