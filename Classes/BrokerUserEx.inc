<?php

require_once 'BrokerUser.inc';

//use DataAccess;
/**
 * Description of BrokerUser
 *
 * @author kami
 */
class BrokerUserEx {

    public static function Insert(BrokerUser $brokerUser) {
        $SQL = "INSERT INTO BrokerUsers (Name,Family,Mobile,Broker,Username,Passwd) VALUES ('" . $brokerUser->Name . "','" . $brokerUser->Family . "','" . $brokerUser->Mobile . "'," . $brokerUser->Broker->BrokerId . ",'" . $brokerUser->Username . "','" . md5($brokerUser->Passwd) . "')";

        //echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new BrokerUser();

    public static function Update(BrokerUser $brokerUser) {
        $SQL = "UPDATE BrokerUsers SET Username = '" . $brokerUser->Username . "',Passwd = '" . md5($brokerUser->Passwd) . "' WHERE BrokerUserId=" . $brokerUser->BrokerUserId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Delete(BrokerUser $brokerUser) {
        $SQL = "DELETE FROM BrokerUsers WHERE BrokerUserId=" . $brokerUser->BrokerUserId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM BrokerUsers ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $brokerUsers = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new BrokerUser();
            $t->BrokerUserId = $row['BrokerUserId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->Mobile = $row['Mobile'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            $brokerUsers[$i] = $t;
            $i++;
        }
        return $brokerUsers;
    }

    public static function GetBrokerUsersForBroker($brokerId) {
        $SQL = "SELECT * FROM BrokerUsers WHERE Broker= " . $brokerId;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $brokerUsers = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new BrokerUser();
            $t->BrokerUserId = $row['BrokerUserId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->Mobile = $row['Mobile'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            $brokerUsers[$i] = $t;
            $i++;
        }
        return $brokerUsers;
    }

    public static function GetOneBrokerUserBasedOnUsername($username) {
        $SQL = "SELECT * FROM BrokerUsers WHERE Username= '" . $username . "'";
        //echo $SQL ."<br />";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        while ($row = mysqli_fetch_array($result)) {
            $t = new BrokerUser();
            $t->BrokerUserId = $row['BrokerUserId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            $t->Broker = $row['Broker'];
            return $t;
        }
    }

    public static function GetOneBrokerUser($Id) {
        $SQL = "SELECT * FROM BrokerUsers WHERE BrokerUserId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new BrokerUser();
            $t->BrokerUserId = $row['BrokerUserId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->Mobile = $row['Mobile'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            return $t;
        }
    }

    public static function Login($brokerUsername, $password) {
        $SQL = "SELECT * FROM BrokerUsers WHERE Username= '" . $brokerUsername . "' AND Passwd='" . md5($password) . "'";
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0)
            return TRUE;
        return FALSE;
    }

//put your code here
}
