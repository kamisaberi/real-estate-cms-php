<?php

session_start();
require_once '../Classes/TeacherEx.inc';

$_SESSION['TeacherLoggedin'] = "NO";
$_SESSION['User'] = "";
setcookie("TeacherUser", '', time() - 3600);
header("Location: ../index.php");







