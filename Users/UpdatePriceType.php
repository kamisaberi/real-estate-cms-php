
<?php

require_once '../Classes/PriceTypeEx.inc';

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

$priceType = new PriceType();
$priceType->PriceTypeId = $pricetypeid;
$priceType->Name = $name;
$priceType->Comment = $comment;
if ($cm == 'edit') {
    PriceTypeEx::Update($priceType);
} else {
    PriceTypeEx::Insert($priceType);
}

header("Location: PriceTypes.php");



