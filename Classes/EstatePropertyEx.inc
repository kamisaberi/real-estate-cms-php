<?php

require_once 'EstateProperty.inc';

//use DataAccess;
/**
 * Description of EstateProperty
 *
 * @author kami
 */
class EstatePropertyEx {

    public static function Insert(EstateProperty $estateProperty) {
        $SQL = "INSERT INTO EstateProperties (Value,Estate,EstatePropertyType) VALUES ('" . $estateProperty->Value . "'," . $estateProperty->Estate->EstateId . "," . $estateProperty->EstatePropertyType->EstatePropertyTypeId . ")";
        echo $SQL ."<br/>";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new EstateProperty();

    public static function Update(EstateProperty $estateProperty) {
        $SQL = "UPDATE EstateProperties SET Name = '" . $estateProperty->Name . "',TedadVahed = " . $estateProperty->TedadVahed . ",Tozihat='" . $estateProperty->Tozihat . "'  WHERE EstatePropertyId=" . $estateProperty->EstatePropertyId;
        //echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Delete(EstateProperty $estateProperty) {
        $SQL = "DELETE FROM EstateProperties WHERE EstatePropertyId=" . $estateProperty->EstatePropertyId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function DeleteOneEstateProperties($estateId) {
        $SQL = "DELETE FROM EstateProperties WHERE Estate=" . $estateId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    function Test(EstateProperty $estateProperty) {
        $s = array();
        $t = new EstateProperty();
        $t->Name = "ali";
        $s[0] = $t;
        $t1 = new EstateProperty();
        $t1->Name = "reza";
        $s[1] = $t1;
        return $s;
    }

    public static function Fill() {
        $SQL = "SELECT * FROM EstatePropertys ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $estatePropertys = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new EstateProperty();
            $t->EstatePropertyId = $row['EstatePropertyId'];
            $t->Name = $row['Name'];
            $t->TedadVahed = $row['TedadVahed'];
            $t->Tozihat = $row['Tozihat'];
            $estatePropertys[$i] = $t;
            $i++;
        }
        return $estatePropertys;
    }

    public static function GetPropertiesOfEstate($estateId) {
        $SQL = "SELECT
EstatePropertyTypes.EstatePropertyTypeId AS `EstatePropertyType.EstatePropertyTypeId`,
EstatePropertyTypes.`Name` AS `EstatePropertyType.Name`,
EstatePropertyTypes.`Comment` AS `EstatePropertyType.Comment`,
EstatePropertyTypes.`Values` AS `EstatePropertyType.Values`,
EstateProperties.EstatePropertyId AS `EstateProperty.EstatePropertyId`,
EstateProperties.`Value` AS `EstateProperty.Value`,
EstateProperties.Estate AS `EstateProperty.Estate`,
EstateProperties.EstatePropertyType AS `EstateProperty.EstatePropertyType`
FROM
EstateProperties
INNER JOIN EstatePropertyTypes ON EstateProperties.EstatePropertyType = EstatePropertyTypes.EstatePropertyTypeId 
WHERE EstateProperties.Estate = " . $estateId;
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $estatePropertys = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new EstateProperty();
            $t->EstatePropertyId = $row['EstateProperty.EstatePropertyId'];
            $t->Value = $row['EstateProperty.Value'];
            $type = new EstatePropertyType();
            $type->EstatePropertyTypeId = $row['EstatePropertyType.EstatePropertyTypeId'];
            $type->Name = $row['EstatePropertyType.Name'];
            $type->Comment = $row['EstatePropertyType.Comment'];
            $type->Values = $row['EstatePropertyType.Values'];
            $t->EstatePropertyType = $type;
            $estatePropertys[$i] = $t;
            $i++;
        }
        return $estatePropertys;
    }

    public static function GetOnEstateProperty($Id) {
        $SQL = "SELECT * FROM EstatePropertys WHERE EstatePropertyId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new EstateProperty();
            $t->EstatePropertyId = $row['EstatePropertyId'];
            $t->Name = $row['Name'];
            $t->TedadVahed = $row['TedadVahed'];
            $t->Tozihat = $row['Tozihat'];
            return $t;
        }
    }

//put your code here
}
