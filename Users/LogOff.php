<?php

session_start();
require_once '../Classes/UserEx.inc';
require_once '../Classes/LoggedinUserEx.inc';
require_once '../Classes/BrokerEx.inc';
require_once '../Classes/BrokerUserEx.inc';
//$username = $_POST['username'];
//$password = $_POST['password'];

if ($_SESSION['UserType'] == "Admin") {
    $_SESSION['AdminLoggedin'] = "NO";
    LoggedinUserEx::DeleteLoggedoutUser($_SESSION['User']);
    $_SESSION['User'] = "";
    $_SESSION['UserType'] = "";
    setcookie("AdminUser", '', time() - 3600);
    setcookie("UserType", '', time() - 3600);
    setcookie("Session", '', time() - 3600);
    setcookie("Password", '', time() - 3600);

    header("Location: Index.php");
} elseif ($_SESSION['UserType'] == "Broker") {
    $_SESSION['BrokerLoggedin'] = "NO";
    LoggedinUserEx::DeleteLoggedoutUser($_SESSION['User']);
    $_SESSION['User'] = "";
    $_SESSION['UserType'] = "";
    setcookie("BrokerUser", '', time() - 3600);
    setcookie("UserType", '', time() - 3600);
    setcookie("Session", '', time() - 3600);
    setcookie("Password", '', time() - 3600);

    header("Location: Index.php");
} elseif ($_SESSION['UserType'] == "Client") {
    $_SESSION['StudentLoggedin'] = "NO";
    LoggedinUserEx::DeleteLoggedoutUser($_SESSION['User']);
    $_SESSION['User'] = "";
    $_SESSION['UserType'] = "";
    setcookie("StudentUser", '', time() - 3600);
    setcookie("UserType", '', time() - 3600);
    setcookie("Session", '', time() - 3600);
    setcookie("Password", '', time() - 3600);

    header("Location: Index.php");
}

$_SESSION['AdminLoggedin'] = "NO";
$_SESSION['BrokerLoggedin'] = "NO";
$_SESSION['StudentLoggedin'] = "NO";
$_SESSION['User'] = "";
$_SESSION['UserType'] = "";
setcookie("StudentUser", '', time() - 3600);
setcookie("UserType", '', time() - 3600);
header("Location: ../index.php");





