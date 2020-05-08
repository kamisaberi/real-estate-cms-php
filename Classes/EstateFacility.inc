<?php

require_once 'DataAccess.inc';
require_once 'EstateFacilityType.inc';
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
class EstateFacility {

    public $EstateFacilityId = 1;
    public $Value;
    public $Estate;
    public $EstateFacilityType;

    public function __construct() {
        $estateFacilityType = new EstateFacilityType();
        $estate = new Estate();
        $this->Estate = $estate;
        $this->EstateFacilityType = $estateFacilityType;
    }

}
