<?php
require_once '../Classes/EstateEx.inc';
require_once '../Classes/LoggedinUserEx.inc';
if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$slides= $_POST['slides'];
//echo $cm;

EstateEx::ChangeDisplayType($slides, 3);

header("Location: Estates.php");



