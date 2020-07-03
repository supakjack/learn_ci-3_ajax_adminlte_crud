<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Person extends CI_Controller
{
    public $post; // set value from post


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model', 'model');
        $this->post = (object) $this->input->post();
        $this->model->table = 'person';
        $this->model->data = $this->post;
    }

    public function get()
    {
        echo json_encode(['data' => $this->model->select()]);
    }

    public function post()
    {
        echo json_encode(['data' => $this->model->insert()]);
    }

    public function update()
    {
        echo json_encode(['data' => $this->model->update()]);
    }

    public function delete()
    {
        echo json_encode(['data' => $this->model->delete()]);
    }
}

/* End of file Person.php */
