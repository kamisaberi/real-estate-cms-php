<?php

require_once  'EstateFacilityType.inc';

//use DataAccess;
/**
 * Description of EstateFacilityType
 *
 * @author kami
 */
class EstateFacilityTypeEx {

    public static function Insert(EstateFacilityType $estateFacilityType) {
        $SQL = "INSERT INTO EstateFacilityTypes (Name,Comment) VALUES ('" . $estateFacilityType->Name . "','"  . $estateFacilityType->Comment . "')";
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new EstateFacilityType();

    public static function Update(EstateFacilityType $estateFacilityType) {
        $SQL = "UPDATE EstateFacilityTypes SET Name = '" . $estateFacilityType->Name  . "', Comment ='" . $estateFacilityType->Comment . "' WHERE EstateFacilityTypeId=" . $estateFacilityType->EstateFacilityTypeId;
        $db = new DataAccess();
        echo $SQL;
        $db->Execute($SQL);
    }

    public static function Delete(EstateFacilityType $estateFacilityType) {
        $SQL = "DELETE FROM EstateFacilityTypes WHERE EstateFacilityTypeId=" . $estateFacilityType->EstateFacilityTypeId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM EstateFacilityTypes ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $estateFacilityTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new EstateFacilityType();
            $t->EstateFacilityTypeId = $row['EstateFacilityTypeId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            $estateFacilityTypes[$i] = $t;
            $i++;
        }
        return $estateFacilityTypes;
    }

        public static function GetPropertiesForEstate($estateId) {
        $SQL = "SELECT * FROM EstateProperties WHERE Estate= " . $estateId;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $estateFacilityTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $t = new EstateFacilityType();
            $t->EstateFacilityTypeId = $row['EstateFacilityTypeId'];
            $t->Name = $row['Name'];
            $t->Value = $row['Value'];
            $t->Comment = $row['Comment'];
            $t->Estate->EstateId = $row['Estate'];
            $estateFacilityTypes[$i] = $t;
            $i++;
        }
        return $estateFacilityTypes;
    }

    public static function GetOneEstateFacilityType($Id) {
        $SQL = "SELECT * FROM EstateFacilityTypes WHERE EstateFacilityTypeId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new EstateFacilityType();
            $t->EstateFacilityTypeId = $row['EstateFacilityTypeId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            return $t;
        }
    }


    
//put your code here
}
