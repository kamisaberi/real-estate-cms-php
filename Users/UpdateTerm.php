
<?php

require_once '../Classes/TermEx.inc';

$cm = $_POST['command'];
//echo $cm;
$termid= $_POST['termid'];
$salshoroo = $_POST['salshoroo'];
$salpayan = $_POST['salpayan'];
$nimsal = $_POST['nimsal'];
$tozihat = $_POST['tozihat'];


$term = new Term();
$term ->TermId = $termid;
$term ->SalShoroo = $salshoroo;
$term ->SalPayan = $salpayan;
$term ->NimSal = $nimsal;
$term ->Tozihat = $tozihat;
//echo $teacher->TeacherId ;
//echo $teacher->Name ;
//echo $teacher->Family ;
//echo $teacher->Username ;
//echo $teacher->Passwd ;
//echo $cm;
if ($cm == 'edit') {
    TermEx::Update($term);
} else {
    TermEx::Insert($term);
}

header("Location: Terms.php");



