<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Stills_m extends MY_Model
{
  public $table = 'site_still';
  public $table_gallery = 'site_still_gallery';

  public $primary_key = 'id';
  public $foreign_key = 'id_still';

  public function get($params = array())
  {
    $options = array(
      'search' => FALSE,
      'offset' => FALSE, // A partir de qual row retornar
      'limit' => FALSE, // Quantidade de rows a retornar
      'order_by' => FALSE, // Ordenação das colunas
      'count' => FALSE, // TRUE para trazer apenas a contagem / FALSE para trazer os resultados
      'id' => FALSE,
      'where' => FALSE, // Array especifico de where
    );
    $params = array_merge($options, $params);

    if ($params['count']) {
      $this->db->select('COUNT(DISTINCT ' . $this->table . '.id) AS count');
    } else {
      $this->db->select($this->table . '.*');
      $this->db->select("DATE_FORMAT($this->table.date, '%d.%m.%Y') as date_formatted", false);

      if ($params['search']) {
        $this->db
          ->like("$this->table.name", $params['search'], 'both')
          ->or_like("$this->table.description", $params['search'], 'both')
          ->or_like("$this->table.date", $params['search'], 'both')
          ->or_like("$this->table.link", $params['search'], 'both');
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

    return $query->result();
  }

  public function get_images($params)
  {
    $options = array(
      'id' => FALSE,
      'name' => FALSE,
    );

    $params = array_merge($options, $params);

    $this->db
      ->select("$this->table_gallery.file_name")
      ->from($this->table_gallery);

    if ($params['id']) {
      $this->db->where('id_still', $params['id']);
    }

    if ($params['name']) {
      $this->db->where('file_name', $params['name']);
    }

    $query = $this->db->get();
    if ($params['name']) {
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

    $images = isset($data['images']) ? $data['images'] : array();
    unset($data['images']);

    $insert = array_merge($data, $insert);

    $this->db->trans_start();
    $this->db->insert($this->table, $insert);

    if (!empty($images)) {
      $id = $this->db->insert_id();
      $insert_images = array();
      foreach (reset($images) as $image) {
        $insert_images[] = array('id_still' => $id, 'file_name' => $image);
      }
      $this->db->insert_batch($this->table_gallery, $insert_images);
    }

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

    $update = array_merge($data, $update);
    echo '<pre>';die(var_dump($update));

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
