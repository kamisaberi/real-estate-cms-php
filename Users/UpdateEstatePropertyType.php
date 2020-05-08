
<?php

require_once '../Classes/EstatePropertyTypeEx.inc';

require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$cm = $_POST['command'];
//echo $cm;
$estatetypeid = $_POST['estatetypeid'];
//echo $estatetypeid ."<br/>";
$name = $_POST['name'];
$comment = $_POST['comment'];
$values= $_POST['values'];
$estatePropertyTypes = new EstatePropertyType();
$estatePropertyTypes->EstatePropertyTypeId = $estatetypeid;
$estatePropertyTypes->Name = $name;
$estatePropertyTypes->Comment = $comment;
$estatePropertyTypes->Values = $values;
if ($cm == 'edit') {
    EstatePropertyTypeEx::Update($estatePropertyTypes);
} else {
    EstatePropertyTypeEx::Insert($estatePropertyTypes);
}

header("Location: EstatePropertyTypes.php");



