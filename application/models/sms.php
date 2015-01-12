<?php

/**
 * Created by PhpStorm.
 * User: kbsoft
 * Date: 12/30/14
 * Time: 7:47 AM
 */
class Sms extends CI_Model
{

    public $system_config;
    private $number;
    private $message;

    function __construct($number = NULL, $message = NULL)
    {
        $this->system_config = new System_Configuration();
        $this->number = $number;
        $this->message = $message;
        Requests::register_autoloader();
    }

    function send()
    {
        if($this->number == NULL or $this->message == NULL){
            return false;
        }
        $headers = array('Accept' => 'application/json');
        $data = array('mobile_number' => $this->number, 'message' => $this->message);
        $response = Requests::post($this->system_config->service_url('sms/send'), $headers,$data);
        return $response;
    }

    function set_message($message)
    {
        $this->message = $message;
    }

}