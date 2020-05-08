
<?php

require_once '../Classes/EstateTypeEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}



$cm = $_POST['command'];
//echo $cm;
$estatetypeid = $_POST['estatetypeid'];
$name = $_POST['name'];
$comment = $_POST['comment'];

$estateType = new EstateType();
$estateType->EstateTypeId = $estatetypeid;
$estateType->Name = $name;
$estateType->Comment = $comment;
if ($cm == 'edit') {
    EstateTypeEx::Update($estateType);
} else {
    EstateTypeEx::Insert($estateType);
}

header("Location: EstateTypes.php");



