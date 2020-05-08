<?php


$id = $_GET['id'];
require_once '../Classes/EstateTypeEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$estateType = new EstateType();
$estateType->EstateTypeId = $id;
EstateTypeEx::Delete($estateType);
header("Location: EstateTypes.php");
