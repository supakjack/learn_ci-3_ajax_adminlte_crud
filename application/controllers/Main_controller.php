<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');
/*
Main_controller
Controller of Main_controller
@author Supak Pukdam
@Create Date 2563-07-01
*/
class Main_controller extends CI_Controller
{

    public $header; // config header template path
    public $footer; // config footer template path
    public $data; // pass value to view
    public $post; // set value from post


    /*initail value
	* @name __construct
	* @input   -
	* @output  -
	* @author Supak Pukdam
	* @Create Date 2563-07-01
	*/
    public function __construct()
    {
        parent::__construct();
        $this->data = null;
        $this->post = (object) $this->input->post();
        $this->config->load('person_config');
        $this->header = $this->config->item('template')['header'];
        $this->footer = $this->config->item('template')['footer'];
        $this->load->model('Main_model', 'model');
    }

    /*display template output of system
	* @name output
	* @input   $view name of view , $data data of view , $return to return view or not
	* @output  display of view
	* @author Supak Pukdam
	* @Create Date 2563-07-01
	*/
    public function output($view)
    {
        $this->load->view($this->header, $this->data, FALSE);
        $this->load->view($view);
        $this->load->view($this->footer);
    }
}

/* End of file Main_controller.php */
