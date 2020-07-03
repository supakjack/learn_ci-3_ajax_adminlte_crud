<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'controllers/Main_controller.php');
class Pages extends Main_controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function management()
    {
        $this->output('v_management');
    }
}

/* End of file Pages.php */
