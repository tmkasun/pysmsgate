<?php

/**
 * Created by PhpStorm.
 * User: kbsoft
 * Date: 12/29/14
 * Time: 10:05 PM
 * @property string service_url
 */
class System_Configuration
{

    const CONIG_PATH = "application/config/sms_gate.ini";
    private $configuration_array;
    private $service_url;

    function __construct()
    {
        $this->fetch_configuration();
    }

    public function get_config()
    {
        return $this->configuration_array;
    }

    private function fetch_configuration()
    {
        $this->configuration_array = parse_ini_file(self::CONIG_PATH);
    }


    public function sms_service_url()
    {
        $this->service_url = "http://" . $this->configuration_array['hostname'] . ":" . $this->configuration_array['port'] . "/sms_service";
        return $this->service_url;
    }
}