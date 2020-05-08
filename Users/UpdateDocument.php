
<?php

require_once '../Classes/DocumentEx.inc';
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

$document = new Document();
$document->DocumentId = $estatetypeid;
$document->Name = $name;
$document->Comment = $comment;
if ($cm == 'edit') {
    DocumentEx::Update($document);
} else {
    DocumentEx::Insert($document);
}

header("Location: Documents.php");



