<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagnose extends CI_Controller
{

    public function index()
    {
        $modem = new Modem();
        $response = $modem->all();
        $this->load->view("diagnose/status" , array('response' => $response));
    }

}
