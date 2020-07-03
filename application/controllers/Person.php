<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Person extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model', 'model');
    }

    public function get()
    {
        echo json_encode(['data' => $this->model->select('person', (object) $this->input->post())]);
    }

    public function post()
    {
        echo json_encode(['data' => $this->model->insert('person', (object) $this->input->post())]);
    }

    public function update()
    {
        echo json_encode(['data' => $this->model->update('person', (object) $this->input->post())]);
    }

    public function delete()
    {
        echo json_encode(['data' => $this->model->delete('person', (object) $this->input->post())]);
    }
}

/* End of file Person.php */
