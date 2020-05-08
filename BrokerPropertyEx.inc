<?php

require_once  'BrokerProperty.inc';

//use DataAccess;
/**
 * Description of BrokerProperty
 *
 * @author kami
 */
class BrokerPropertyEx {

    public static function Insert(BrokerProperty $brokerProperty) {
        $SQL = "INSERT INTO BrokerPropertys (Name,Value,Broker,Comment) VALUES ('" . $brokerProperty->Name . "','" . $brokerProperty->Value . "'," . $brokerProperty->Broker->BrokerId  . ",'" . $brokerProperty->Comment . "')";
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new BrokerProperty();

    public static function Update(BrokerProperty $brokerProperty) {
        $SQL = "UPDATE BrokerPropertys SET Name = '" . $brokerProperty->Name . "',Family = '" . $brokerProperty->Family . "',Username='" . $brokerProperty->Username . "',Passwd= '" . md5($brokerProperty->Passwd) . "', CodeMelli ='" . $brokerProperty->CodeMelli . "' WHERE BrokerPropertyId=" . $brokerProperty->BrokerPropertyId;
        $db = new DataAccess();
        echo $SQL;
        $db->Execute($SQL);
    }

    public static function Delete(BrokerProperty $brokerProperty) {
        if (count(ClassRoomEx::GetClassRoomsForBrokerProperty($brokerProperty->BrokerPropertyId)) > 0) {
            return;
        }
        $SQL = "DELETE FROM BrokerPropertys WHERE BrokerPropertyId=" . $brokerProperty->BrokerPropertyId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM BrokerPropertys ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $brokerPropertys = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new BrokerProperty();
            $t->BrokerPropertyId = $row['BrokerPropertyId'];
            $t->Name = $row['Name'];
            $t->Value = $row['Value'];
            $t->Comment = $row['Comment'];
            $t->Broker->BrokerId = $row['Broker'];
            $brokerPropertys[$i] = $t;
            $i++;
        }
        return $brokerPropertys;
    }

        public static function GetPropertiesForBroker($brokerId) {
        $SQL = "SELECT * FROM BrokerProperties WHERE Broker= " . $brokerId;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $brokerPropertys = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $t = new BrokerProperty();
            $t->BrokerPropertyId = $row['BrokerPropertyId'];
            $t->Name = $row['Name'];
            $t->Value = $row['Value'];
            $t->Comment = $row['Comment'];
            $t->Broker->BrokerId = $row['Broker'];
            $brokerPropertys[$i] = $t;
            $i++;
        }
        return $brokerPropertys;
    }

    public static function GetOneBrokerProperty($Id) {
        $SQL = "SELECT * FROM BrokerPropertys WHERE BrokerPropertyId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new BrokerProperty();
            $t->BrokerPropertyId = $row['BrokerPropertyId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            $t->CodeMelli = $row['CodeMelli'];
            return $t;
        }
    }

        public static function GetOnBrokerPropertyBasedOnUsername($Id) {
        $SQL = "SELECT * FROM BrokerPropertys WHERE Username= '" . $Id ."'";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new BrokerProperty();
            $t->BrokerPropertyId = $row['BrokerPropertyId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            $t->CodeMelli = $row['CodeMelli'];
            return $t;
        }
    }

    public static function Login($username, $password) {
        $SQL = "SELECT * FROM BrokerPropertys WHERE Username= '" . $username . "' AND Passwd='" . md5($password) . "'";
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0)
            return TRUE;
        return FALSE;
    }

    
    

    
    
//put your code here
}
