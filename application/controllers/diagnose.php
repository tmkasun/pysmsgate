<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagnose extends CI_Controller
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
        $response = $this->modem->all();
        $this->load->view("diagnose/status", array('response' => $response));
    }

    public function modal()
    {
        $fd = $this->input->post('fd');
        $modem_object = $this->modem->find($fd);
        $this->load->view("/diagnose/partials/diagnose_modal", array("modem" => $modem_object));
    }


    public function dial()
    {
        $fd = $this->input->post('fd');
        $number = $this->input->post('number');
        $response = $this->modem->dial($number, $fd);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));

    }


    public function send()
    {
        /*
         * Signal <span class="text-info" style="float: right;"> <?= $signal_pre ?> </span><br/>

         *
         * */
        $fd = $this->input->post('fd');
        $number = $this->input->post('sms_number');

        $modem = $this->modem->find($fd);
        $modem = $modem->modems;
        $signal_pre = round($modem->signalStrength * 100 / 32.2, 2);
        $message = "Knnect SMS Gateway Service\nTesting SMS\nSignal $signal_pre %\nImei $modem->imei \nNetwork $modem->networkName \nSMSC $modem->smsc \nIMSI $modem->imsi \nModem path $modem->port \nBaudrate $modem->baudrate";

        $sms = new Sms($number, $message);
        $status = $sms->send();

        $this->output->set_content_type('application/json')->set_output(json_encode($status));
    }
}
