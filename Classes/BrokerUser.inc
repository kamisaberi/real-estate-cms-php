<?php

require_once 'DataAccess.inc';
require_once 'Broker.inc';
//use DataAccess;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teacher
 *
 * @author kami
 */
class BrokerUser {

    public $BrokerUserId = 1;
    public $Name;
    public $Family;
    public $Mobile;
    public $Broker;
    public $Username;
    public $Passwd;
    
    public function __construct() {
        $broker = new Broker();
        $this->Broker =$broker;
    }
    
    
    
}
