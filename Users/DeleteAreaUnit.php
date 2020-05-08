<?php


$id = $_GET['id'];
require_once '../Classes/AreaUnitEx.inc';

require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$areaUnit = new AreaUnit();
$areaUnit->AreaUnitId = $id;
AreaUnitEx::Delete($areaUnit);
header("Location: AreaUnits.php");
