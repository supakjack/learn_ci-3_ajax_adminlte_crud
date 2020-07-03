<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'controllers/Main_controller.php');
class Person extends Main_controller
{


    public function __construct()
    {
        parent::__construct();
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
