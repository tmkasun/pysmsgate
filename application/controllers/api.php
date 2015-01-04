<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function index()
    {
        redirect('/api/documentation');
    }

    public function documentation()
    {
        $this->load->view("api/documentation");
    }

}
