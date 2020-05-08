<?php


$id = $_GET['id'];
require_once '../Classes/DocumentEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$document = new Document();
$document->DocumentId = $id;
DocumentEx::Delete($document);
header("Location: Documents.php");
