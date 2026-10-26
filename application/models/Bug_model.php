<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bug_model extends CI_Model
{
    public function search($query = '')
    {
        if ($query !== '') {
            $this->db->group_start()
                ->like('title', $query)
                ->or_like('description', $query)
                ->group_end();
        }
        return $this->db
                        ->order_by('created_at', 'DESC')
                        ->get('bugs')
                        ->result_array();
    }

    public function create(array $data)
    {
        return $this->db->insert('bugs', $data);
    }

    public function update_status($id, $status)
    {
        return $this->db->where('id', (int) $id)->update('bugs', array('status' => $status));
    }
}
