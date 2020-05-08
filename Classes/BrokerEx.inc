<?php

require_once  'Broker.inc';
//require_once  'ClassRoomEx.inc';
//use DataAccess;
/**
 * Description of Broker
 *
 * @author kami
 */
class BrokerEx {

    public static function Insert(Broker $broker) {
        $SQL = "INSERT INTO Brokers (Name,Address) VALUES ('" . $broker->Name . "','" . $broker->Address .  "')";
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new Broker();

    public static function Update(Broker $broker) {
        $SQL = "UPDATE Brokers SET Name = '" . $broker->Name . "',Family = '" . $broker->Family . "',Username='" . $broker->Username . "',Passwd= '" . md5($broker->Passwd) . "', CodeMelli ='" . $broker->CodeMelli . "' WHERE BrokerId=" . $broker->BrokerId;
        $db = new DataAccess();
        echo $SQL;
        $db->Execute($SQL);
    }

    public static function Delete(Broker $broker) {
        $SQL = "DELETE FROM Brokers WHERE BrokerId=" . $broker->BrokerId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM Brokers ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $brokers = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new Broker();
            $t->BrokerId = $row['BrokerId'];
            $t->Name = $row['Name'];
            $t->Address= $row['Address'];
            $brokers[$i] = $t;
            $i++;
        }
        return $brokers;
    }

    public static function GetOneBroker($Id) {
        $SQL = "SELECT * FROM Brokers WHERE BrokerId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new Broker();
            $t->BrokerId = $row['BrokerId'];
            $t->Name = $row['Name'];
            $t->Address= $row['Address'];
            return $t;
        }
    }

        public static function GetOneBrokerBasedOnUsername($Id) {
        $SQL = "SELECT * FROM Brokers WHERE Username= '" . $Id . "'";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new Broker();
            $t->BrokerId = $row['BrokerId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            $t->CodeMelli = $row['CodeMelli'];
            return $t;
        }
    }

    public static function Login($username, $password) {
        $SQL = "SELECT * FROM Brokers WHERE Username= '" . $username . "' AND Passwd='" . md5($password) . "'";
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0)
            return TRUE;
        return FALSE;
    }

    
    

    
    
//put your code here
}
