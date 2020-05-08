<?php

require_once 'PriceType.inc';

//use DataAccess;
/**
 * Description of PriceType
 *
 * @author kami
 */
class PriceTypeEx {

    public static function Insert(PriceType $priceType) {
        $SQL = "INSERT INTO PriceTypes (Name,Comment) VALUES  ('" . $priceType->Name . "','" . $priceType->Comment .  "')";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new PriceType();

    public static function Update(PriceType $priceType) {
        $SQL = "UPDATE PriceTypes SET Name = '" . $priceType->Name . "',Comment = '" . $priceType->Comment . "' WHERE PriceTypeId=" . $priceType->PriceTypeId;
        echo $SQL;
        $db = new DataAccess();
        echo $SQL;
        $db->Execute($SQL);
    }

    public static function Delete(PriceType $priceType) {
        $SQL = "DELETE FROM PriceTypes WHERE PriceTypeId=" . $priceType->PriceTypeId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM PriceTypes ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $priceTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new PriceType();
            $t->PriceTypeId = $row['PriceTypeId'];
            $t->Name = $row['Name'];
            $t->Comment= $row['Comment'];
            $priceTypes[$i] = $t;
            $i++;
        }
        return $priceTypes;
    }

    public static function GetOnePriceType($Id) {
        $SQL = "SELECT * FROM PriceTypes WHERE PriceTypeId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new PriceType();
            $t->PriceTypeId = $row['PriceTypeId'];
            $t->Name = $row['Name'];
            $t->Comment= $row['Comment'];
            return $t;
        }
    }

//put your code here
}
