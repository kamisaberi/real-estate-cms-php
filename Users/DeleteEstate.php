<?php

$id = $_GET['id'];
require_once '../Classes/EstateEx.inc';
$estate = new Estate();
$estate->EstateId = $id;
EstateEx::Delete($estate);

header("Location: Estates.php");



