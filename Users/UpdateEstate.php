
<?php

require_once '../Classes/EstateEx.inc';
require_once '../Classes/EstatePropertyEx.inc';
require_once '../Classes/EstateFacilityEx.inc';

require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin' && LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Broker') {
    header("Location: Index.php");
    die();
}



$cm = $_POST['command'];
//echo $cm;
$estateid = $_POST['estateid'];
$title = $_POST['title'];
$comment = $_POST['comment'];
$address = $_POST['address'];
$price = $_POST['totalprice'];
$totalarea= $_POST['totalarea'];
$buildingarea= $_POST['buildingarea'];
//$pricetypeid = $_POST['pricetypeid'];
$estatetypeid = $_POST['estatetypeid'];
//$priceunitid = $_POST['priceunitid'];
//echo $priceunitid;
$brokerid = $_POST['brokerid'];
$documentid= $_POST['documentid'];

$estate = new Estate();
$estate->EstateId = $estateid;
$estate->Title = $title;
$estate->Comment = $comment;
$estate->Address = $address;
$estate->TotalPrice = $price;
$estate->PricePerMeter = $price;
$estate->EstateType->EstateTypeId = $estatetypeid;
$estate->Broker->BrokerId = $brokerid;
$estate->Document->DocumentId = $documentid;
echo $documentid . "<br/>";
$estate->DisplayType->DisplayTypeId = 1;

$estate->TotalArea = $totalarea;
$estate->BuildingArea = $buildingarea;
if ($cm == 'edit') {
    EstateEx::Update($estate);
    $properties = $_POST['properties'];
    $values = $_POST['values'];
    EstatePropertyEx::DeleteOneEstateProperties($estate->EstateId);
    for ($i = 0; $i < count($properties); $i++) {
        if (trim($values[$i]) != "") {
            //echo "dfsdfdfsdfdsffsd<br/>";
            $estateProperty = new EstateProperty();
            $estateProperty->Value = $values[$i];
            $estateProperty->EstatePropertyType->EstatePropertyTypeId = $properties[$i];
            $estateProperty->Estate->EstateId = $estate->EstateId;
            EstatePropertyEx::Insert($estateProperty);
        }
    }

    $facilities = $_POST['facilities'];
    //$values = $_POST['values'];
    EstateFacilityEx::DeleteOneEstateFacilities($estate->EstateId);
    for ($i = 0; $i < count($facilities); $i++) {
        $estateFacility = new EstateFacility();
        $estateFacility->Value = $values[$i];
        $estateFacility->EstateFacilityType->EstateFacilityTypeId = $facilities[$i];
        $estateFacility->Estate->EstateId = $estate->EstateId;
        EstateFacilityEx::Insert($estateFacility);
    }
} else {
    EstateEx::Insert($estate);
    //echo $estate->Broker->BrokerId;
    $id = EstateEx::GetOneEstateId($estate);
    $properties = $_POST['properties'];
    $values = $_POST['values'];
    EstatePropertyEx::DeleteOneEstateProperties($id);
    for ($i = 0; $i < count($properties); $i++) {
        if (trim($values[$i]) != "") {
            $estateProperty = new EstateProperty();
            $estateProperty->Value = $values[$i];
            $estateProperty->EstatePropertyType->EstatePropertyTypeId = $properties[$i];
            $estateProperty->Estate->EstateId = $id;
            EstatePropertyEx::Insert($estateProperty);
        }
    }

    $facilities = $_POST['facilities'];
    //$values = $_POST['values'];
    EstateFacilityEx::DeleteOneEstateFacilities($id);
    for ($i = 0; $i < count($facilities); $i++) {
        $estateFacility = new EstateFacility();
        $estateFacility->Value = $values[$i];
        $estateFacility->EstateFacilityType->EstateFacilityTypeId = $facilities[$i];
        $estateFacility->Estate->EstateId = $id;
        $estateFacility->Value='-';
        EstateFacilityEx::Insert($estateFacility);
    }
}

header("Location: Estates.php");



