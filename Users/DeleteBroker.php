<?php


$id = $_GET['id'];
require_once '../Classes/BrokerEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$broker = new Broker();
$broker->BrokerId = $id;
BrokerEx::Delete($broker);


header("Location: Brokers.php");



