<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{
    public function select($table, $data)
    {
        if (isset($data->id)) {
            $this->db->where('id', $data->id);
        }
        return $this->db->get($table,)->result();
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table,  $data);
    }

    public function delete($table, $data)
    {
        $this->db->where('id',  $data->id);
        return $this->db->delete($table);
    }

    public function update($table, $data)
    {
        $this->db->set($data);
        $this->db->where('id',  $data->id);
        return $this->db->update($table);
    }
}

/* End of file Main_model.php */
