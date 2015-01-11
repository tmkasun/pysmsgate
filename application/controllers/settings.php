<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagnose extends CI_Controller
{

    public function index()
    {
        $modem = new Modem();
        $response = $modem->ping();

        $class = "alert-danger";
        if($response->result){
            $class = "alert-success";
        }
        $this->load->view("diagnose/status" , array('class' => $class));
    }

}
