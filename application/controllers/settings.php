<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagnose extends CI_Controller
{

    public function index()
    {
        $modem = new Modem();
        $response = $modem->ping();

        $this->load->view("settings/index" , array('response' => $response));
    }

}
