<?php

require_once 'AreaUnit.inc';

//use DataAccess;
/**
 * Description of AreaUnit
 *
 * @author kami
 */
class AreaUnitEx {

    public static function Insert(AreaUnit $areaUnit) {
        $SQL = "INSERT INTO AreaUnits (Name,Comment) VALUES ('" . $areaUnit->Name. "','" . $areaUnit->Comment. "')";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new AreaUnit();

    public static function Update(AreaUnit $areaUnit) {
        $SQL = "UPDATE AreaUnits SET Name = '" . $areaUnit->Name . "',Comment= '" . $areaUnit->Comment. "'  WHERE AreaUnitId=" . $areaUnit->AreaUnitId;
        $db = new DataAccess();
        echo $SQL;
        $db->Execute($SQL);
    }

    public static function Delete(AreaUnit $areaUnit) {
        $SQL = "DELETE FROM AreaUnits WHERE AreaUnitId=" . $areaUnit->AreaUnitId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM AreaUnits ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $areaUnits = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new AreaUnit();
            $t->AreaUnitId = $row['AreaUnitId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];

            $areaUnits[$i] = $t;
            $i++;
        }
        return $areaUnits;
    }


    public static function GetOneAreaUnit($Id) {
        $SQL = "SELECT * FROM AreaUnits  WHERE AreaUnitId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new AreaUnit();
            $t->AreaUnitId = $row['AreaUnitId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];

            return $t;
        }
    }

//put your code here
}
