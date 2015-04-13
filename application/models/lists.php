<?php

class Lists extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->mongodb = new MongoClient();
        $this->track = $this->mongodb->track;
    }

    function stats(){
//        $collection_stats = $this->history_data->command(array('collStats' => 'history'));
//        return $collection_stats;
    }

    /* TODO: temporary for hao dataset */
    function customers_count(){
        $c_cout =  $this->track->customers->count();
        return $c_cout;
    }

    /* TODO: temporary for hao dataset */
    function users_count(){
        $u_cout =  $this->track->users->count();
        return $u_cout;
    }

    /* TODO: temporary for hao dataset */
    function customers(){
        $result =  $this->track->customers->find();
        return $result;
    }

    /* TODO: temporary for hao dataset */
    function users(){
        $result =  $this->track->users->find();
        return $result;
    }

}
