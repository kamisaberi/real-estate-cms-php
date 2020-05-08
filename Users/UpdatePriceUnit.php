
<?php

require_once '../Classes/PriceUnitEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$cm = $_POST['command'];
//echo $cm;
$pricetypeid = $_POST['pricetypeid'];
$name = $_POST['name'];
$comment = $_POST['comment'];

$priceUnit = new PriceUnit();
$priceUnit->PriceUnitId = $pricetypeid;
$priceUnit->Name = $name;
$priceUnit->Comment = $comment;
if ($cm == 'edit') {
    PriceUnitEx::Update($priceUnit);
} else {
    PriceUnitEx::Insert($priceUnit);
}

header("Location: PriceUnits.php");



