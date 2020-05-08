<?php

session_start();
require_once '../Classes/UserEx.inc';
require_once '../Classes/LoggedinUserEx.inc';
require_once '../Classes/BrokerEx.inc';
require_once '../Classes/BrokerUserEx.inc';

//require_once '../Classes/StudentEx.inc';
$username = $_POST['username'];
$password = $_POST['password'];

echo $username;
echo '<br />';
echo $password;

if (UserEx::Login($username, $password) == TRUE) {

    $_SESSION['AdminLoggedin'] = "YES";
    $_SESSION['User'] = $username;
    setcookie("AdminUser", $username, time() + 60 * 60 * 24 * 7);
    $_SESSION['UserType'] = "Admin";
    setcookie("UserType", "Admin", time() + 60 * 60 * 24 * 7);
    setcookie("User", $username, time() + 60 * 60 * 24 * 7);
    LoggedinUserEx::InsertInLoggedinUser($username, $password);
    $md = md5($password) . md5(strrev($password));
    setcookie("Session", session_id(), time() + 60 * 60 * 24 * 7);
    setcookie("Password", $md, time() + 60 * 60 * 24 * 7);
    header("Location: Index.php");
} elseif (BrokerUserEx::Login($username, $password) == TRUE) {

    $_SESSION['BrokerLoggedin'] = "YES";
    $_SESSION['User'] = $username;
    setcookie("BrokerUser", $username, time() + 60 * 60 * 24 * 7);
    setcookie("User", $username, time() + 60 * 60 * 24 * 7);
    $_SESSION['UserType'] = "Broker";
    setcookie("UserType", "Broker", time() + 60 * 60 * 24 * 7);
    LoggedinUserEx::InsertInLoggedinUser($username, $password);
    $md = md5($password) . md5(strrev($password));
    setcookie("Session", session_id(), time() + 60 * 60 * 24 * 7);
    setcookie("Password", $md, time() + 60 * 60 * 24 * 7);

    header("Location: Index.php");
}// elseif (StudentEx::Login($username, $password) == TRUE) {
//
//    $_SESSION['StudentLoggedin'] = "YES";
//    $_SESSION['User'] = $username;
//    setcookie("StudentUser", $username, time() + 60 * 60 * 24 * 7);
//    $_SESSION['UserType'] = "Client";
//    setcookie("UserType", "Client", time() + 60 * 60 * 24 * 7);
//
//    header("Location: Index.php");
//}
else {
    $_SESSION['LoginError'] = "نام کاربری یا رمز عبور اشتباه می باشد";
    header("Location: Login.php");
}







