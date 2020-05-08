<?php
session_start();
require_once '../Classes/TeacherEx.inc';

$username = $_POST['username'];
$password = $_POST['password'];

if (TeacherEx::Login($username, $password) == TRUE) {

    $_SESSION['TeacherLoggedin']="YES";
    $_SESSION['User']=$username;
    setcookie("TeacherUser", $username, time()+60*60*24*7);
    header("Location: Index.php");
} else {
    header("Location: Login.php");
}







