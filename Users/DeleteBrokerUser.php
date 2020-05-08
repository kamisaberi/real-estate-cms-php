<?php


$id = $_GET['id'];
require_once '../Classes/BrokerUserEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$brokerUser = new BrokerUser();
$brokerUser->BrokerUserId = $id;
BrokerUserEx::Delete($brokerUser);


header("Location: BrokerUsers.php");



