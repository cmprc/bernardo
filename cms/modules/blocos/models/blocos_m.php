<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Blocos_m extends MY_Model
{
  public $table = 'site_block';
  public $primary_key = 'id';

  public function get($params = array())
  {
    $options = array(
      'search' => FALSE,
      'offset' => FALSE,
      'limit' => FALSE,
      'order_by' => FALSE,
      'count' => FALSE,
      'id' => FALSE,
      'where' => FALSE,
    );
    $params = array_merge($options, $params);

    if ($params['count']) {
      $this->db->select('COUNT(DISTINCT ' . $this->table . '.id) AS count');
    } else {
      $this->db->select($this->table . '.*');
      $this->db->select("DATE_FORMAT($this->table.created, '%d.%m.%Y') as date_formatted", false);

      if ($params['search']) {
        $this->db
          ->like("$this->table.page", $params['search'], 'both')
          ->or_like("$this->table.section", $params['search'], 'both')
          ->or_like("$this->table.title", $params['search'], 'both')
          ->or_like("$this->table.subtitle", $params['search'], 'both');
      }

      if ($params['limit'] !== FALSE && $params['offset'] === FALSE) {
        $this->db->limit($params['limit']);
      } elseif ($params['limit'] !== FALSE) {
        $this->db->limit($params['limit'], $params['offset']);
      }

      if ($params['id']) {
        $this->db->where($this->table . '.id', $params['id']);
      }

      if ($params['where']) {
        $this->db->where($params['where']);
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
    } else {
      $response = array();
      foreach ($query->result() as $key => $value) {
        if (!empty($value->slug)) {
          $response[$value->slug] = $value;
        } else {
          $response[] = $value;
        }
      }
      return $response;
    }

    return $query->result();
  }

  public function insert($data)
  {
    $insert = $data;
    $insert['slug'] = $this->slugify($insert['page'] . '-' . $insert['section']);

    $this->db->trans_start();
    $this->db->insert($this->table, $insert);

    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function update($data)
  {
    $id = $data['id'];
    $image_uploaded = isset($data['image_uploaded']) ? $data['image_uploaded'] : FALSE;
    unset($data['id']);

    $update = $data;
    $update['slug'] = $this->slugify($update['page'] . '-' . $update['section']);

    if(!$image_uploaded && !isset($data['image'])){
        $update['image'] = NULL;
    }

    $this->db->trans_start();

    $this->db
      ->where('id', $id)
      ->update($this->table, $update);

    $this->db->trans_complete();

    return $this->db->trans_status();
  }

  public function insert_file($file)
    {
        return $file->name . '.' . $file->info->extension;
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
