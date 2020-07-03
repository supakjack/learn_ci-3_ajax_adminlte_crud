<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{

    public $table;
    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function select()
    {
        if (isset($this->data->id)) {
            $this->db->where('id', $this->data->id);
        }
        return $this->db->get($this->table)->result();
    }

    public function insert()
    {
        return $this->db->insert($this->table, $this->data);
    }

    public function delete()
    {
        $this->db->where('id', $this->data->id);
        return $this->db->delete($this->table);
    }

    public function update()
    {
        $this->db->set($this->data);
        $this->db->where('id', $this->data->id);
        return $this->db->update($this->table);
    }
}

/* End of file M_person.php */
