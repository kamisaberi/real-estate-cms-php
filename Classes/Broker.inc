<?php

require_once 'DataAccess.inc';
require_once 'BrokerProperty.inc';
//use DataAccess;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Broker
 *
 * @author kami
 */
class Broker {

    public $BrokerId = 1;
    public $Name;
    public $Address;
    public $BrokerProperties ;
    
    public function __construct() {
        $this->BrokerProperties =array();
    }
}
