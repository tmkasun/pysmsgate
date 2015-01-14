<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Campaigns extends CI_Controller
{
    var $modem;

    function __construct()
    {
        parent::__construct();
        $this->load->library('Modem');
        $this->modem = new Modem();
    }

    public function index()
    {
        $this->load->view("campaign/home");
    }

    public function lists()
    {
        $this->load->view("campaign/lists");
    }


    public function wizard()
    {
        $this->load->view("campaign/wizard");
    }
}