
<?php

require_once '../Classes/BrokerUserEx.inc';

$cm = $_POST['command'];
//echo $cm;
$brokeruserid= $_POST['brokeruserid'];
$name = $_POST['name'];
$family= $_POST['family'];
$mobile = $_POST['mobile'];
$username= $_POST['username'];
$passwd = $_POST['passwd'];


$brokerUser= new BrokerUser();
$brokerUser->BrokerUserId = $brokeruserid;
$brokerUser->Name = $name;
$brokerUser->Family = $family;
$brokerUser->Mobile = $mobile;
$brokerUser->Username= $username;
$brokerUser->Passwd = $passwd;

//echo $teacher->TeacherId ;
//echo $teacher->Name ;
//echo $teacher->Family ;
//echo $teacher->Username ;
//echo $teacher->Passwd ;
//echo $cm;
if ($cm == 'edit') {
    BrokerUserEx::Update($brokerUser);
} else {
    BrokerUserEx::Insert($brokerUser);
}

header("Location: BrokerUsers.php");



