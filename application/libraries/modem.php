<?php

/**
 * Created by PhpStorm.
 * User: kbsoft
 * Date: 12/29/14
 * Time: 10:05 PM
 */
class Modem
{

    function __construct()
    {
        $this->system_config = new System_Configuration();
        Requests::register_autoloader();
    }


    function ping($fd = null)
    {
        $headers = array('Accept' => 'application/json');
        $data = array('fd' => $fd);
        try{
            $response = Requests::get($this->system_config->service_url('modem/ping'), $headers, $data);
            $return_value = $response->body;
        }catch (Requests_Exception $e){
            $return_value = json_encode(array('result'=> false, 'status' => 'fail'));
        }
        return json_decode($return_value);
    }


    function all()
    {
        $headers = array('Accept' => 'application/json');
        try{
            $response = Requests::get($this->system_config->service_url('modem/all'), $headers);
            $return_value = $response->body;
        }catch (Requests_Exception $e){
            $return_value = json_encode(array('result'=> false, 'status' => 'fail'));
        }
        return json_decode($return_value);
    }

    function find($fd)
    {
        $headers = array('Accept' => 'application/json');
        $data = array('fd'=>$fd);
        try{
            $response = Requests::get($this->system_config->service_url('modem/all?'.http_build_query($data)), $headers);
            $return_value = $response->body;
        }catch (Requests_Exception $e){
            $return_value = json_encode(array('result'=> false, 'status' => 'fail'));
        }
        return json_decode($return_value);
    }


    function dial($number,$fd = null)
    {
        $headers = array('Accept' => 'application/json');
        $data = array(
            'fd'=>$fd,
            'number' => $number
        );
        try{
            $response = Requests::post($this->system_config->service_url('modem/dial'), $headers, $data);
            $return_value = $response->body;
        }catch (Requests_Exception $e){
            $return_value = json_encode(array('result'=> false, 'status' => 'fail'));
        }
        return json_decode($return_value);
    }
}