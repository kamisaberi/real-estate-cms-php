<?php

require_once 'DataAccess.inc';
require_once 'EstatePropertyType.inc';
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
class EstateProperty {

    public $EstatePropertyId = 1;
    public $Value;
    public $Estate;
    public $EstatePropertyType;

    public function __construct() {
        $estatePropertyType = new EstatePropertyType();
        $estate = new Estate();
        $this->Estate = $estate;
        $this->EstatePropertyType = $estatePropertyType;
    }

}
