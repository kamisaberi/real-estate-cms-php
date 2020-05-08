
<?php

require_once '../Classes/BrokerPropertyTypeEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$cm = $_POST['command'];
//echo $cm;
$brokertypeid = $_POST['brokertypeid'];
//echo $brokertypeid;
$name = $_POST['name'];
$comment = $_POST['comment'];

$brokerPropertyTypes = new BrokerPropertyType();
$brokerPropertyTypes->BrokerPropertyTypeId = $brokertypeid;

$brokerPropertyTypes->Name = $name;
$brokerPropertyTypes->Comment = $comment;
if ($cm == 'edit') {
    BrokerPropertyTypeEx::Update($brokerPropertyTypes);
} else {
    BrokerPropertyTypeEx::Insert($brokerPropertyTypes);
}

header("Location: BrokerPropertyTypes.php");



