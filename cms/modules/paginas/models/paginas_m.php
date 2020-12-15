<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Paginas_m extends MY_Model
{
  public $table = 'cfr_pages';
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
      'slug' => FALSE,
      'where' => FALSE, // Array especifico de where
    );
    $params = array_merge($options, $params);

    if ($params['count']) {
      $this->db->select('COUNT(DISTINCT ' . $this->table . '.id) AS count');
    } else {
      $this->db->select($this->table . '.*');

      if ($params['limit'] !== FALSE && $params['offset'] === FALSE) {
        $this->db->limit($params['limit']);
      } elseif ($params['limit'] !== FALSE) {
        $this->db->limit($params['limit'], $params['offset']);
      }

      if ($params['id']) {
        $this->db->where($this->table . '.id', $params['id']);
      }

      if ($params['slug']) {
        $this->db->where($this->table . '.slug', $params['slug']);
      }

      if ($params['order_by']) {
        $this->db->order_by($params['order_by']);
      } else {
        $this->db->order_by($this->table . '.id', 'asc');
      }
    }

    $this->db->from($this->table);

    $query = $this->db->get();

    if ($params['id'] || $params['slug'] ) {
      return $query->row();
    }

    return $query->result();
  }

  public function update($data)
  {
    $id = $data['id'];
    unset($data['id']);

    $update = $data;

    $this->db->trans_start();
    $this->db
      ->where('id', $id)
      ->update($this->table, $update);
    $this->db->trans_complete();

    return $this->db->trans_status();
  }

}
