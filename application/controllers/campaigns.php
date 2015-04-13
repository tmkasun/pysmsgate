<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Campaigns extends CI_Controller
{
    var $modem;

    function __construct()
    {
        parent::__construct();
        $this->load->model('lists');
        $this->load->library('Modem');
        $this->modem = new Modem();
    }

    public function index()
    {
        $this->load->view("campaign/home");
    }

    public function lists()
    {
        $data = array('customers_count' => $this->lists->customers_count(),
            'users_count' => $this->lists->users_count());
        $this->load->view("campaign/lists", $data);
    }

    public function get_list($id)
    {
        /* TODO: tempory id check for 1 and 2 */
        if ($id == '1') {
            $data = array('people' => $this->lists->customers());
        } elseif ($id == '2') {
            $data = array('people' => $this->lists->users());
        }

        $this->load->view("campaign/list", $data);
    }

    public function wizard()
    {
        $this->load->view("campaign/wizard");
    }
}