<?php


$id = $_GET['id'];
require_once '../Classes/EstatePropertyTypeEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$estatePropertyType = new EstatePropertyType();
$estatePropertyType->EstatePropertyTypeId = $id;
EstatePropertyTypeEx::Delete($estatePropertyType);
header("Location: EstatePropertyTypes.php");
