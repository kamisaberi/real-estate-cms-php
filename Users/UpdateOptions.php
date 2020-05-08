
<?php

require_once '../Classes/OptionEx.inc';


require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}

$option = new Option();

$option->Value = $_POST['termid'];
$option->Name = "ActiveTerm";
OptionEx::SetValue($option);

$option->Value = $_POST['recordnumber'];
$option->Name = "NumberOfRecords";
OptionEx::SetValue($option);

header("Location: Index.php");



