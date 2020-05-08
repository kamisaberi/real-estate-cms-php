<?php


$id = $_GET['id'];
require_once '../Classes/PriceTypeEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$priceType = new PriceType();
$priceType->PriceTypeId = $id;
PriceTypeEx::Delete($priceType);
header("Location: PriceTypes.php");
