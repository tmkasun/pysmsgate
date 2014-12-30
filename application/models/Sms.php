<?php
/**
 * Created by PhpStorm.
 * User: kbsoft
 * Date: 12/30/14
 * Time: 7:47 AM
 */

class Sms {

    function __construct(){

    }

    function send(){

        Requests::register_autoloader();
        $headers = array('Accept' => 'application/json');
        $request = Requests::get('https://api.github.com/users/tmkasun', $headers);

        var_dump($request->body);
    }

}