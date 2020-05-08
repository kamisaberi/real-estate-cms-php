<?php

require_once 'EstatePropertyType.inc';

//use DataAccess;
/**
 * Description of EstatePropertyType
 *
 * @author kami
 */
class EstatePropertyTypeEx {

    public static function Insert(EstatePropertyType $estatePropertyType) {
        $SQL = "INSERT INTO EstatePropertyTypes (Name,Comment,`Values`) VALUES ('" . $estatePropertyType->Name . "','" . $estatePropertyType->Comment . "','" . $estatePropertyType->Values . "')";
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new EstatePropertyType();

    public static function Update(EstatePropertyType $estatePropertyType) {
        $SQL = "UPDATE EstatePropertyTypes SET Name = '" . $estatePropertyType->Name . "', Comment ='" . $estatePropertyType->Comment . "',`Values`='" . $estatePropertyType->Values . "' WHERE EstatePropertyTypeId=" . $estatePropertyType->EstatePropertyTypeId;
        echo $SQL;
        $db = new DataAccess();
        //echo $SQL;
        $db->Execute($SQL);
    }

    public static function Delete(EstatePropertyType $estatePropertyType) {
        $SQL = "DELETE FROM EstatePropertyTypes WHERE EstatePropertyTypeId=" . $estatePropertyType->EstatePropertyTypeId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM EstatePropertyTypes ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $estatePropertyTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new EstatePropertyType();
            $t->EstatePropertyTypeId = $row['EstatePropertyTypeId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            $t->Values = $row['Values'];
            $estatePropertyTypes[$i] = $t;
            $i++;
        }
        return $estatePropertyTypes;
    }

    public static function GetPropertiesForEstate($estateId) {
        $SQL = "SELECT * FROM EstateProperties WHERE Estate= " . $estateId;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $estatePropertyTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $t = new EstatePropertyType();
            $t->EstatePropertyTypeId = $row['EstatePropertyTypeId'];
            $t->Name = $row['Name'];
            $t->Value = $row['Value'];
            $t->Comment = $row['Comment'];
            $t->Estate->EstateId = $row['Estate'];
            $t->Values = $row['Values'];
            $estatePropertyTypes[$i] = $t;
            $i++;
        }
        return $estatePropertyTypes;
    }

    public static function GetOneEstatePropertyType($Id) {
        $SQL = "SELECT * FROM EstatePropertyTypes WHERE EstatePropertyTypeId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new EstatePropertyType();
            $t->EstatePropertyTypeId = $row['EstatePropertyTypeId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            $t->Values = $row['Values'];
            return $t;
        }
    }

//put your code here
}
