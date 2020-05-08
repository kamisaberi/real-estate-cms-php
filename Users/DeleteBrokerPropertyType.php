<?php


$id = $_GET['id'];
require_once '../Classes/BrokerPropertyTypeEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$brokerPropertyType = new BrokerPropertyType();
$brokerPropertyType->BrokerPropertyTypeId = $id;
BrokerPropertyTypeEx::Delete($brokerPropertyType);
header("Location: BrokerPropertyTypes.php");
