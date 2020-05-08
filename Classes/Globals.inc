<?php

require_once 'DataAccess.inc';
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
class Globals {

    public static function ConvertURL($url) {
        if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
            return "/RealEstates/" . $url;
        } else {
            return $url;
        }
    }

}
