<?php

require_once 'DataAccess.inc';
require_once 'PriceType.inc';
require_once 'PriceUnit.inc';
require_once 'AreaUnit.inc';
require_once 'Broker.inc';
require_once 'EstateType.inc';
require_once 'DisplayType.inc';
require_once 'Document.inc';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Estate {

    public $EstateId;
    public $Title;
    public $Comment;
    public $Address;
    public $TotalArea;
    public $BuildingArea;
    public $EstateType;
    public $DisplayType;
    public $TotalPrice;
    public $PricePerMeter;
    public $Broker;
    public $Document;
    public $EstateProperties ;
    public $EstateFacilities ;



    public function __construct() {
        $estateType= new EstateType();
        $displayType= new DisplayType();
        $document= new Document();
        $broker= new Broker();
        $this->EstateType = $estateType;
        $this->DisplayType = $displayType;
        $this->Broker=$broker;
        $this->Document=$document;
        $this->EstateProperties =array();
        $this->EstateFacilities =array();
    }
}
