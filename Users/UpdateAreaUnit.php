
<?php

require_once '../Classes/AreaUnitEx.inc';


require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}


$cm = $_POST['command'];
//echo $cm;
$areatypeid = $_POST['areatypeid'];
$name = $_POST['name'];
$comment = $_POST['comment'];

$areaUnit = new AreaUnit();
$areaUnit->AreaUnitId = $areatypeid;
$areaUnit->Name = $name;
$areaUnit->Comment = $comment;
if ($cm == 'edit') {
    AreaUnitEx::Update($areaUnit);
} else {
    AreaUnitEx::Insert($areaUnit);
}

header("Location: AreaUnits.php");



