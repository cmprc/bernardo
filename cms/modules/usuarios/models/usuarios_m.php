<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Usuarios_m extends MY_Model
{
  public $table = 'cfr_user';

  public $primary_key = 'id';
  public $foreign_key = 'id_user';

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

    return $query->result();
  }

  public function insert($data)
  {
    $insert = array(
      'author' => isset($data['author']) && !empty($data['author']) ? $data['author'] : 'Bernardo Mottim',
      'date' => isset($data['date']) && !empty($data['date']) ? $data['date'] : date('Y-m-d'),
    );

    $insert = array_merge($insert, $data);

    $this->db->trans_start();
    $this->db->insert($this->table, $insert);
    $this->db->trans_complete();

    return $this->db->trans_status();
  }

  public function update($data)
  {
    $update = array(
      'author' => isset($data['author']) && !empty($data['author']) ? $data['author'] : 'Bernardo Mottim',
      'date' => isset($data['date']) && !empty($data['date']) ? $data['date'] : date('Y-m-d'),
    );

    $id = $data['id'];
    unset($data['id']);

    $update = array_merge($update, $data);

    $this->db->trans_start();
    $this->db
      ->where('id', $id)
      ->update($this->table, $update);
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
}
