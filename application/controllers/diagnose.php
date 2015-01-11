<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagnose extends CI_Controller
{

    public function index()
    {
        $this->load->view("diagnose/status");
    }

}
