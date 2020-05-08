<?php

require_once 'UserEx.inc';
require_once 'BrokerUserEx.inc';
//use DataAccess;
/**
 * Description of User
 *
 * @author kami
 */
class LoggedinUserEx {

    public static function InsertInLoggedinUser($username, $password) {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        $sessionId = session_id();

        $SQL = "INSERT INTO LoggedinUsers (Username,Passwd,SessionId,IP) VALUES ('" . $username . "','" . md5($password) . "','" . $sessionId . "','" . $ipaddress . "')";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function DeleteLoggedoutUser($username) {
        $SQL = "DELETE FROM  LoggedinUsers WHERE Username ='$username'";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function CheckVisitorIsALoggedinUser($username, $password) {


        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        //echo $ipaddress . "<br/>";
        $sessionId = session_id();

        $SQL = "SELECT * FROM LoggedinUsers WHERE Username= '" . $username . "' AND Passwd='" . substr($password, 0, 32) . "' AND SessionId='" . $sessionId . "' AND IP='" . $ipaddress . "'";
        // echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0) {

            return TRUE;
        }
        return FALSE;
    }

    public static function CheckLoggedinUserIsAdminOrBroker($username) {
        if (UserEx::GetOneUserBasedOnUsername($username)!=NULL) {
            return 'Admin';
        } elseif (BrokerUserEx::GetOneBrokerUserBasedOnUsername($username)!=NULL) {
            return 'Broker';
        }
        return 'Nothing';
    }

//put your code here
}
