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
    $return = $query->result();

    if ($params['id']) {
      $return = $query->row();
    }
    else{
      foreach ($return as $key => $value) {
        $value->images = $this->get_images(array('id' => $value->id));
      }
    }

    return $return;
  }

  public function get_images($params)
  {
    $options = array(
      'id' => FALSE,
      'name' => FALSE,
    );

    $params = array_merge($options, $params);

    $this->db
      ->select("$this->table_gallery.file_name, $this->table_gallery.id")
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
    unset($data['images'], $data['id']);

    $insert = array_merge($data, $insert);

    $this->db->trans_start();
    $this->db->insert($this->table, $insert);
    $id = $this->db->insert_id();
    $this->db->trans_complete();

    return $this->db->trans_status() ? $id : FALSE;
  }

  public function update($data)
  {
    $update = array(
      'author' => isset($data['author']) && !empty($data['author']) ? $data['author'] : 'Bernardo Mottim',
      'date' => isset($data['date']) && !empty($data['date']) ? $data['date'] : date('Y-m-d'),
    );

    $id = $data['id'];
    $current_images = $this->get_images(array('id' => $id));
    $images_uploaded = isset($data['images_uploaded']) ? $data['images_uploaded'] : array();
    unset($data['id'], $data['images_uploaded']);

    $update = array_merge($data, $update);

    $this->db->trans_start();

    $this->db
      ->where('id', $id)
      ->update($this->table, $update);

    if(!empty($current_images)){
        $this->load->helper('file');

        foreach ($current_images as $key => $image) {
            if(!in_array($image->id, $images_uploaded)){
                $this->db->where('id', $image->id)->delete($this->table_gallery);
                delete_file(site_url('../userfiles/stills/' . $image->file_name));
            }
        }
    }

    $this->db->trans_complete();

    return $this->db->trans_status() ? $id : FALSE;
  }

  public function insert_file($file)
    {
        $this->db->trans_start();

        //Conteudo de file vem do UploadHandler, em libraries
        $data = array(
            'id_still' => $file->id_parent,
            'file_name'  => $file->name . '.' . $file->info->extension,
        );

        //$this->table_file definido no MY_Model
        $this->db->insert($this->table_gallery, $data);
        $id = $this->db->insert_id();

        $this->db->trans_complete();

        return $this->db->trans_status() ? $id : FALSE;
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
