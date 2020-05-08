<?php

require_once 'Estate.inc';

//use DataAccess;
/**
 * Description of Estate
 *
 * @author kami
 */
class EstateEx {

    public static $SQL = "SELECT
Estates.EstateId AS `Estate.EstateId`,
Estates.Title AS `Estate.Title`,
Estates.`Comment` AS `Estate.Comment`,
Estates.Address AS `Estate.Address`,
Estates.Broker AS `Estate.Broker`,
Estates.EstateType AS `Estate.EstateType`,
DisplayTypes.DisplayTypeId AS `DisplayType.DisplayTypeId`,
DisplayTypes.`Name` AS `DisplayType.Name`,
DisplayTypes.`Comment` AS `DisplayType.Comment`,
EstateTypes.EstateTypeId AS `EstateType.EstateTypeId`,
EstateTypes.`Name` AS `EstateType.Name`,
EstateTypes.`Comment` AS `EstateType.Comment`,
Brokers.BrokerId AS `Broker.BrokerId`,
Brokers.`Name` AS `Broker.Name`,
Brokers.Address AS `Broker.Address`,
Estates.PricePerMeter AS `Estate.PricePerMeter`,
Estates.TotalPrice AS `Estate.TotalPrice`,
Estates.BuildingArea AS `Estate.BuildingArea`,
Estates.TotalArea AS `Estate.TotalArea`,
Documents.DocumentId AS `Document.DocumentId`,
Documents.`Name` AS `Document.Name`,
Documents.`Comment` AS `Document.Comment`
FROM
Estates
INNER JOIN DisplayTypes ON DisplayTypes.DisplayTypeId = Estates.DisplayType
INNER JOIN EstateTypes ON EstateTypes.EstateTypeId = Estates.EstateType
INNER JOIN Brokers ON Brokers.BrokerId = Estates.Broker
INNER JOIN Documents ON Documents.DocumentId = Estates.Document

 ";

    public static function Insert(Estate $estate) {
        //$SQL = "INSERT INTO Estates (Title,Comment,Address,Price,PriceType,PriceUnit,Broker,EstateType) VALUES ('" . $estate->Title . "','" . $estate->Comment . "','" . $estate->Address . "'," . $estate->Price . "," . $estate->PriceType->PriceTypeId . "," . $estate->PriceUnit->PriceUnitId . "," . $estate->Broker->BrokerId . "," . $estate->EstateType->EstateTypeId . ")";
        $SQL = "INSERT INTO Estates (Title,Comment,Address,Broker,TotalArea , BuildingArea , TotalPrice , PricePerMeter, EstateType ,DisplayType,Document) VALUES ('" . $estate->Title . "','" . $estate->Comment . "','" . $estate->Address . "'," . $estate->Broker->BrokerId . "," . $estate->TotalArea . "," . $estate->BuildingArea . "," . $estate->TotalPrice . "," . $estate->PricePerMeter . " ," . $estate->EstateType->EstateTypeId . "," . $estate->DisplayType->DisplayTypeId . "," . $estate->Document->DocumentId . ")";

        //echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new Estate();

    public static function Update(Estate $estate) {
        $SQL = "UPDATE Estates SET Title = '" . $estate->Title . "',Comment= '" . $estate->Comment . "',Address='" . $estate->Address . "',TotalPrice= " . $estate->TotalPrice . ",PricePerMeter=" . $estate->PricePerMeter . ",TotalArea=" . $estate->TotalArea . ",BuildingArea=" . $estate->BuildingArea . ",Broker=" . $estate->Broker->BrokerId . ",EstateType=" . $estate->EstateType->EstateTypeId . ",Document=" . $estate->Document->DocumentId . " WHERE EstateId=" . $estate->EstateId;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function ChangeDisplayType($newEstates, $displayType) {

        $SQL = "UPDATE Estates SET DisplayType=" . 1 . " WHERE DisplayType=" . $displayType;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
        foreach ($newEstates as $estate) {
            $SQL = "UPDATE Estates SET DisplayType=" . $displayType . " WHERE EstateId=" . $estate;
            echo $SQL;
            $db = new DataAccess();
            $db->Execute($SQL);
        }
    }

    public static function Delete(Estate $estate) {
        $SQL = "DELETE FROM Estates WHERE EstateId=" . $estate->EstateId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $db = new DataAccess();
        $result = $db->ExecuteSelect(EstateEx::$SQL);
        $Estates = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $t = new Estate();
            $t->EstateId = $row['Estate.EstateId'];
            $t->Title = $row['Estate.Title'];
            $t->Comment = $row['Estate.Comment'];
            $t->TotalArea = $row['Estate.TotalArea'];
            $t->BuildingArea = $row['Estate.BuildingArea'];
            $t->TotalPrice = $row['Estate.TotalPrice'];
            $t->PricePerMeter = $row['Estate.PricePerMeter'];
            $t->Address = $row['Estate.Address'];

            $broker = new Broker();
            $broker->BrokerId = $row['Broker.BrokerId'];
            $broker->Name = $row['Broker.Name'];
            $broker->Address = $row['Broker.Address'];
            $t->Broker = $broker;


            $displayType = new DisplayType();
            $displayType->DisplayTypeId = $row['DisplayType.DisplayTypeId'];
            $displayType->Name = $row['DisplayType.Name'];
            $displayType->Comment = $row['DisplayType.Comment'];
            $t->DisplayType = $displayType;

            $document = new Document();
            $document->DocumentId = $row['Document.DocumentId'];
            $document->Name = $row['Document.Name'];
            $document->Comment = $row['Document.Comment'];
            $t->Document = $document;



            $Estates[$i] = $t;
            $i++;
        }
        return $Estates;
    }

    public static function GetOneEstate($Id) {
        $SQL = EstateEx::$SQL . " WHERE Estates.EstateId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new Estate();
            $t->EstateId = $row['Estate.EstateId'];
            $t->Title = $row['Estate.Title'];
            $t->Comment = $row['Estate.Comment'];
            $t->TotalArea = $row['Estate.TotalArea'];
            $t->BuildingArea = $row['Estate.BuildingArea'];
            $t->TotalPrice = $row['Estate.TotalPrice'];
            $t->PricePerMeter = $row['Estate.PricePerMeter'];
            $t->Address = $row['Estate.Address'];

            $broker = new Broker();
            $broker->BrokerId = $row['Broker.BrokerId'];
            $broker->Name = $row['Broker.Name'];
            $broker->Address = $row['Broker.Address'];
            $t->Broker = $broker;


            $displayType = new DisplayType();
            $displayType->EstateTypeId = $row['DisplayType.DisplayTypeId'];
            $displayType->Name = $row['DisplayType.Name'];
            $displayType->Comment = $row['DisplayType.Comment'];
            $t->DisplayType = $displayType;


            $document = new Document();
            $document->DocumentId = $row['Document.DocumentId'];
            $document->Name = $row['Document.Name'];
            $document->Comment = $row['Document.Comment'];
            $t->Document = $document;


            return $t;
        }
    }

    public static function GetOneEstateId(Estate $estate) {
        $SQL = "SELECT
Estates.EstateId,
Estates.Title,
Estates.`Comment`,
Estates.Address,
Estates.PricePerMeter,
Estates.TotalPrice,
Estates.BuildingArea,
Estates.TotalArea,
Estates.EstateType,
Estates.Broker,
Estates.DisplayType
FROM
Estates
WHERE
Estates.Title = '$estate->Title' AND
Estates.`Comment` = '$estate->Comment' AND
Estates.Address ='$estate->Address' AND
Estates.PricePerMeter = $estate->PricePerMeter AND
Estates.TotalPrice = $estate->TotalPrice AND
Estates.BuildingArea = $estate->BuildingArea AND
Estates.TotalArea = $estate->TotalArea AND
Estates.EstateType = " . $estate->EstateType->EstateTypeId . " AND
Estates.Broker = " . $estate->Broker->BrokerId . " AND
Estates.DisplayType = " . $estate->DisplayType->DisplayTypeId;
        // echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        while ($row = mysqli_fetch_array($result)) {
            return $row['EstateId'];
        }
    }

    public static function GetEstatesForSlideShow() {
        $SQL = EstateEx::$SQL . " WHERE Estates.DisplayType=2";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $Estates = array();
        $i = 0;

        while ($row = mysqli_fetch_array($result)) {
            $t = new Estate();
            $t->EstateId = $row['Estate.EstateId'];
            $t->Title = $row['Estate.Title'];
            $t->Comment = $row['Estate.Comment'];
            $t->TotalArea = $row['Estate.TotalArea'];
            $t->BuildingArea = $row['Estate.BuildingArea'];
            $t->TotalPrice = $row['Estate.TotalPrice'];
            $t->PricePerMeter = $row['Estate.PricePerMeter'];
            $t->Address = $row['Estate.Address'];

            $broker = new Broker();
            $broker->BrokerId = $row['Broker.BrokerId'];
            $broker->Name = $row['Broker.Name'];
            $broker->Address = $row['Broker.Address'];
            $t->Broker = $broker;


            $displayType = new DisplayType();
            $displayType->EstateTypeId = $row['DisplayType.DisplayTypeId'];
            $displayType->Name = $row['DisplayType.Name'];
            $displayType->Comment = $row['DisplayType.Comment'];
            $t->DisplayType = $displayType;

            $document = new Document();
            $document->DocumentId = $row['Document.DocumentId'];
            $document->Name = $row['Document.Name'];
            $document->Comment = $row['Document.Comment'];
            $t->Document = $document;



            $Estates[$i] = $t;
            $i++;
        }
        return $Estates;
    }

    public static function GetEstatesForMainBox() {
        $SQL = EstateEx::$SQL . " WHERE Estates.DisplayType=3";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $Estates = array();
        $i = 0;

        while ($row = mysqli_fetch_array($result)) {
            $t = new Estate();
            $t->EstateId = $row['Estate.EstateId'];
            $t->Title = $row['Estate.Title'];
            $t->Comment = $row['Estate.Comment'];
            $t->TotalArea = $row['Estate.TotalArea'];
            $t->BuildingArea = $row['Estate.BuildingArea'];
            $t->TotalPrice = $row['Estate.TotalPrice'];
            $t->PricePerMeter = $row['Estate.PricePerMeter'];
            $t->Address = $row['Estate.Address'];

            $broker = new Broker();
            $broker->BrokerId = $row['Broker.BrokerId'];
            $broker->Name = $row['Broker.Name'];
            $broker->Address = $row['Broker.Address'];
            $t->Broker = $broker;


            $displayType = new DisplayType();
            $displayType->EstateTypeId = $row['DisplayType.DisplayTypeId'];
            $displayType->Name = $row['DisplayType.Name'];
            $displayType->Comment = $row['DisplayType.Comment'];
            $t->DisplayType = $displayType;


            $document = new Document();
            $document->DocumentId = $row['Document.DocumentId'];
            $document->Name = $row['Document.Name'];
            $document->Comment = $row['Document.Comment'];
            $t->Document = $document;

            $Estates[$i] = $t;
            $i++;
        }
        return $Estates;
    }

    public static function GetEstatesForBroker($brokerId) {
        $SQL = EstateEx::$SQL . " WHERE Brokers.BrokerId=" . $brokerId;

        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $Estates = array();
        $i = 0;

        while ($row = mysqli_fetch_array($result)) {
            $t = new Estate();
            $t->EstateId = $row['Estate.EstateId'];
            $t->Title = $row['Estate.Title'];
            $t->Comment = $row['Estate.Comment'];
            $t->TotalArea = $row['Estate.TotalArea'];
            $t->BuildingArea = $row['Estate.BuildingArea'];
            $t->TotalPrice = $row['Estate.TotalPrice'];
            $t->PricePerMeter = $row['Estate.PricePerMeter'];
            $t->Address = $row['Estate.Address'];

            $broker = new Broker();
            $broker->BrokerId = $row['Broker.BrokerId'];
            $broker->Name = $row['Broker.Name'];
            $broker->Address = $row['Broker.Address'];
            $t->Broker = $broker;


            $displayType = new DisplayType();
            $displayType->EstateTypeId = $row['DisplayType.DisplayTypeId'];
            $displayType->Name = $row['DisplayType.Name'];
            $displayType->Comment = $row['DisplayType.Comment'];
            $t->DisplayType = $displayType;


            $document = new Document();
            $document->DocumentId = $row['Document.DocumentId'];
            $document->Name = $row['Document.Name'];
            $document->Comment = $row['Document.Comment'];
            $t->Document = $document;

            $Estates[$i] = $t;
            $i++;
        }
        return $Estates;
    }

}
