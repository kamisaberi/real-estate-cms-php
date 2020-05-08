<?php

require_once  'BrokerPropertyType.inc';

//use DataAccess;
/**
 * Description of BrokerPropertyType
 *
 * @author kami
 */
class BrokerPropertyTypeEx {

    public static function Insert(BrokerPropertyType $brokerPropertyType) {
        $SQL = "INSERT INTO BrokerPropertyTypes (Name,Comment) VALUES ('" . $brokerPropertyType->Name . "','"  . $brokerPropertyType->Comment . "')";
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new BrokerPropertyType();

    public static function Update(BrokerPropertyType $brokerPropertyType) {
        $SQL = "UPDATE BrokerPropertyTypes SET Name = '" . $brokerPropertyType->Name  . "', Comment ='" . $brokerPropertyType->Comment . "' WHERE BrokerPropertyTypeId=" . $brokerPropertyType->BrokerPropertyTypeId;
        $db = new DataAccess();
        echo $SQL;
        $db->Execute($SQL);
    }

    public static function Delete(BrokerPropertyType $brokerPropertyType) {
        $SQL = "DELETE FROM BrokerPropertyTypes WHERE BrokerPropertyTypeId=" . $brokerPropertyType->BrokerPropertyTypeId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM BrokerPropertyTypes ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $brokerPropertyTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new BrokerPropertyType();
            $t->BrokerPropertyTypeId = $row['BrokerPropertyTypeId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            $brokerPropertyTypes[$i] = $t;
            $i++;
        }
        return $brokerPropertyTypes;
    }

        public static function GetPropertiesForBroker($brokerId) {
        $SQL = "SELECT * FROM BrokerProperties WHERE Broker= " . $brokerId;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $brokerPropertyTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $t = new BrokerPropertyType();
            $t->BrokerPropertyTypeId = $row['BrokerPropertyTypeId'];
            $t->Name = $row['Name'];
            $t->Value = $row['Value'];
            $t->Comment = $row['Comment'];
            $t->Broker->BrokerId = $row['Broker'];
            $brokerPropertyTypes[$i] = $t;
            $i++;
        }
        return $brokerPropertyTypes;
    }

    public static function GetOneBrokerPropertyType($Id) {
        $SQL = "SELECT * FROM BrokerPropertyTypes WHERE BrokerPropertyTypeId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new BrokerPropertyType();
            $t->BrokerPropertyTypeId = $row['BrokerPropertyTypeId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            return $t;
        }
    }


    
//put your code here
}
