<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DataAccess {

    private $Host;
    private $User;
    private $Password;
    private $Database;

    function __construct() {
        if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
            $parse = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/RealEstates/Config/Connection.ini", FALSE);
        } else {
            $parse = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/Config/Connection.ini", FALSE);
        }

        $this->Host = $parse['host'];
        $this->User = $parse['user'];
        $this->Password = $parse['password'];
        $this->Database = $parse['database'];
    }

    public function Execute($SQL) {


        $con = mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        mysqli_query($con, "set character_set_client='utf8'");
        mysqli_query($con, "set character_set_results='utf8'");
        mysqli_query($con, "set collation_connection='utf8_general_ci'");
        mysqli_query($con, $SQL);
        mysqli_close($con);
    }

    public function ExecuteSelect($SQL) {
        $con = mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        mysqli_query($con, "set character_set_client='utf8'");
        mysqli_query($con, "set character_set_results='utf8'");
        mysqli_query($con, "set collation_connection='utf8_general_ci'");
        $result = mysqli_query($con, $SQL);
        mysqli_close($con);
        return $result;
    }

}
