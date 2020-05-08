<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();


if(isset($_COOKIE["TeacherUser"]))
{
    $_SESSION['User'] = $_COOKIE["TeacherUser"];
    $_SESSION['TeacherLoggedin']="YES";
    //header("Location: Index.php");
    
}



if ($_SESSION['TeacherLoggedin'] != "YES") {
    header("Location: Login.php");
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" >

    <head>
        <title>مدرسه غیرانتفاهی شفق</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../Styles/Style.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="Images/students.ico" />
        <script src="../Scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script type="text/javascript" language="javascript">
            $(document).ready(function() {
                $('.Nav li').hover(
                        function() {
                            $('ul', this).stop().slideDown(100);
                        },
                        function() {
                            $('ul', this).stop().slideUp(100);
                        });
            });
        </script>
    </head>
