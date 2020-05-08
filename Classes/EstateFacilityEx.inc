<?php

require_once 'EstateFacility.inc';

//use DataAccess;
/**
 * Description of EstateFacility
 *
 * @author kami
 */
class EstateFacilityEx {

    public static function Insert(EstateFacility $estateFacility) {
        $SQL = "INSERT INTO EstateFacilities (Value,Estate,EstateFacilityType) VALUES ('" . $estateFacility->Value . "'," . $estateFacility->Estate->EstateId . "," . $estateFacility->EstateFacilityType->EstateFacilityTypeId . ")";
        echo $SQL."<br />";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new EstateFacility();

    public static function Update(EstateFacility $estateFacility) {
        $SQL = "UPDATE EstateProperties SET Name = '" . $estateFacility->Name . "',TedadVahed = " . $estateFacility->TedadVahed . ",Tozihat='" . $estateFacility->Tozihat . "'  WHERE EstateFacilityId=" . $estateFacility->EstateFacilityId;
        //echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Delete(EstateFacility $estateFacility) {
        $SQL = "DELETE FROM EstateProperties WHERE EstateFacilityId=" . $estateFacility->EstateFacilityId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function DeleteOneEstateFacilities($estateId) {
        $SQL = "DELETE FROM EstateFacilities WHERE Estate=" . $estateId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    function Test(EstateFacility $estateFacility) {
        $s = array();
        $t = new EstateFacility();
        $t->Name = "ali";
        $s[0] = $t;
        $t1 = new EstateFacility();
        $t1->Name = "reza";
        $s[1] = $t1;
        return $s;
    }

    public static function Fill() {
        $SQL = "SELECT * FROM EstateFacilitys ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $estateFacilitys = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new EstateFacility();
            $t->EstateFacilityId = $row['EstateFacilityId'];
            $t->Name = $row['Name'];
            $t->TedadVahed = $row['TedadVahed'];
            $t->Tozihat = $row['Tozihat'];
            $estateFacilitys[$i] = $t;
            $i++;
        }
        return $estateFacilitys;
    }

    public static function GetFacilitiesOfEstate($estateId) {
        $SQL = "SELECT
EstateFacilityTypes.EstateFacilityTypeId AS `EstateFacilityType.EstateFacilityTypeId`,
EstateFacilityTypes.`Name` AS `EstateFacilityType.Name`,
EstateFacilityTypes.`Comment` AS `EstateFacilityType.Comment`,
EstateFacilities.EstateFacilityId AS `EstateFacility.EstateFacilityId`,
EstateFacilities.`Value` AS `EstateFacility.Value`,
EstateFacilities.Estate AS `EstateFacility.Estate`,
EstateFacilities.EstateFacilityType AS `EstateFacility.EstateFacilityType`
FROM
EstateFacilities
INNER JOIN EstateFacilityTypes ON EstateFacilities.EstateFacilityType = EstateFacilityTypes.EstateFacilityTypeId 
WHERE EstateFacilities.Estate = " . $estateId;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $estateFacilitys = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new EstateFacility();
            $t->EstateFacilityId = $row['EstateFacility.EstateFacilityId'];
            $t->Value = $row['EstateFacility.Value'];
            $type = new EstateFacilityType();
            $type->EstateFacilityTypeId = $row['EstateFacilityType.EstateFacilityTypeId'];
            $type->Name = $row['EstateFacilityType.Name'];
            $type->Comment = $row['EstateFacilityType.Comment'];
            $t->EstateFacilityType = $type;
            $estateFacilitys[$i] = $t;
            $i++;
        }
        return $estateFacilitys;
    }

    public static function GetOnEstateFacility($Id) {
        $SQL = "SELECT * FROM EstateFacilitys WHERE EstateFacilityId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new EstateFacility();
            $t->EstateFacilityId = $row['EstateFacilityId'];
            $t->Name = $row['Name'];
            $t->TedadVahed = $row['TedadVahed'];
            $t->Tozihat = $row['Tozihat'];
            return $t;
        }
    }

//put your code here
}
