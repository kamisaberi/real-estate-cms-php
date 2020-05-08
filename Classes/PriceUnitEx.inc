<?php

require_once 'PriceUnit.inc';

//use DataAccess;
/**
 * Description of PriceUnit
 *
 * @author kami
 */
class PriceUnitEx {

    public static function Insert(PriceUnit $priceUnit) {
        $SQL = "INSERT INTO PriceUnits (Name,Comment) VALUES ('" . $priceUnit->Name. "','" . $priceUnit->Comment. "')";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new PriceUnit();

    public static function Update(PriceUnit $priceUnit) {
        $SQL = "UPDATE PriceUnits SET Name = '" . $priceUnit->Name . "',Comment= '" . $priceUnit->Comment. "'  WHERE PriceUnitId=" . $priceUnit->PriceUnitId;
        $db = new DataAccess();
        echo $SQL;
        $db->Execute($SQL);
    }

    public static function Delete(PriceUnit $priceUnit) {
        $SQL = "DELETE FROM PriceUnits WHERE PriceUnitId=" . $priceUnit->PriceUnitId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM PriceUnits ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $priceUnits = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new PriceUnit();
            $t->PriceUnitId = $row['PriceUnitId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];

            $priceUnits[$i] = $t;
            $i++;
        }
        return $priceUnits;
    }


    public static function GetOnePriceUnit($Id) {
        $SQL = "SELECT * FROM PriceUnits  WHERE PriceUnitId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new PriceUnit();
            $t->PriceUnitId = $row['PriceUnitId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];

            return $t;
        }
    }

//put your code here
}
