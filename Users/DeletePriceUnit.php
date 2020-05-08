<?php


$id = $_GET['id'];
require_once '../Classes/PriceUnitEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$priceUnit = new PriceUnit();
$priceUnit->PriceUnitId = $id;
PriceUnitEx::Delete($priceUnit);
header("Location: PriceUnits.php");
