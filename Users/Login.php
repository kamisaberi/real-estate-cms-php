<?php
require_once '../Classes/UserEx.inc';
require_once '../Classes/LoggedinUserEx.inc';
require_once '../Classes/BrokerEx.inc';
require_once '../Classes/BrokerUserEx.inc';
session_start();
//echo 'sadasdasdsaddadasdasd';
?>
<?php
//if (!isset($_SESSION['UserType'])) {
//    $_SESSION['UserType'] = "";
//}
//if (isset($_COOKIE['User']) && isset($_COOKIE['Password'])) {
//    if (($_SESSION['UserType'] == "Admin" || $_SESSION['UserType'] == "Broker" || $_SESSION['UserType'] == "Client") && LoggedinUserEx::CheckVisitorIsALoggedinUser($_COOKIE['User'], $_COOKIE['Password'])) {
//        ?>
        //<?php
//        echo $_SESSION['User'];
//        header("Location: Index.php");
//    }
//} else {
    ?>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link href="Styles/Style.css" rel="stylesheet" type="text/css"/>

        </head>
        <body>
            <form id="form1" name="form1" method="post" action="CheckLogin.php">
                <table width="510" border="0" align="center" class="ViewTable" >
    <?php
    if (isset($_SESSION['LoginError'])) {
        echo "<tr><td colspan='2' style='color:red;'>" . $_SESSION['LoginError'] . "</td></tr>";
        unset($_SESSION['LoginError']);
    }
    ?>
                    <tr>
                        <td colspan="2">ورود به سایت</td>
                    </tr>
                    <tr>
                        <td>نام کاربری:</td>
                        <td><input type="text" name="username" id="username" /></td>
                    </tr>
                    <tr>
                        <td>رمز عبور:</td>
                        <td><input type="password" name="password" id="password" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="button" id="button" value="ورود" /></td>
                    </tr>
                </table>
            </form>
        </body>
    </html>
    <?php
//}
?>