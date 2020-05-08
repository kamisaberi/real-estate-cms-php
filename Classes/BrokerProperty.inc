<?php

require_once 'DataAccess.inc';
require_once 'BrokerPropertyType.inc';
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
class BrokerProperty {

    public $BrokerPropertyId = 1;
    public $Name;
    public $Value;
    public $Broker;
    public $Comment;
    public $BrokerPropertyType;
    public function __construct() {
        $brokerPropertyType = new BrokerPropertyType();
        $broker = new Broker();
        $this->Broker=$broker;
        $this->BrokerPropertyType=$brokerPropertyType;
    }

}
