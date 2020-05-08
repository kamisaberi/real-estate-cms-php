<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if(isset($_COOKIE["TeacherUser"]))
{
    $_SESSION['User'] = $_COOKIE["TeacherUser"];
    $_SESSION['TeacherLoggedin']="YES";
    header("Location: Index.php");
    
}

?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../Styles/Style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <form id="form1" name="form1" method="post" action="CheckLogin.php">
            <table width="510" border="0" align="center" class="ViewTable">
                <tr>
                    <td colspan="2">Login Form</td>
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
                    <td>&nbsp;</td>
                    <td><input type="submit" name="button" id="button" value="Submit" /></td>
                </tr>
            </table>
        </form>






    </body>
</html>
