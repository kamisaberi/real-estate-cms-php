<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();



//require_once '../Classes/StudentEx.inc';
//require_once '../Classes/TeacherEx.inc';
//require_once '../Classes/OptionEx.inc';
//require_once '../Classes/ClassRoomEx.inc';
//require_once '../Classes/TermEx.inc';
//require_once '../Classes/TeacherEx.inc';
//require_once '../Classes/LectureEx.inc';
//require_once '../Classes/ClassRoomEx.inc';
//require_once '../Classes/StudentEx.inc';
//require_once '../Classes/OptionEx.inc';
//require_once '../Classes/GradeValueEx.inc';
//require_once '../Classes/ClassRoomEx.inc';
//require_once '../Classes/StudentEx.inc';
//require_once '../Classes/OptionEx.inc';
//require_once '../Classes/GradeValueEx.inc';
require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckVisitorIsALoggedinUser($_COOKIE['User'], $_COOKIE['Password']) == FALSE) {
    header("Location: Login.php");
}

if (isset($_COOKIE["AdminUser"])) {
    $_SESSION['User'] = $_COOKIE["AdminUser"];
    //echo $_SESSION['User'] ;
    $_SESSION['AdminLoggedin'] = "YES";
} elseif (isset($_COOKIE["BrokerUser"])) {
    $_SESSION['User'] = $_COOKIE["BrokerUser"];
    //echo $_SESSION['User'] ;
    $_SESSION['BrokerLoggedin'] = "YES";
}
//elseif (isset($_COOKIE["StudentUser"])) {
//    $_SESSION['User'] = $_COOKIE["StudentUser"];
//    //echo $_SESSION['User'] ;
//    $_SESSION['StudentLoggedin'] = "YES";
//}


if (!isset($_SESSION['UserType'])) {
    $_SESSION['UserType'] = "";
}
if ($_SESSION['UserType'] == "Admin") {
    if ($_SESSION['AdminLoggedin'] != "YES") {
        header("Location: Login.php");
    }
} elseif ($_SESSION['UserType'] == "Broker") {
    if ($_SESSION['BrokerLoggedin'] != "YES") {
        header("Location: Login.php");
    }
}
//elseif ($_SESSION['UserType'] == "Client") {
//    if ($_SESSION['StudentLoggedin'] != "YES") {
//        header("Location: Login.php");
//    }
//}


include_once '../ckeditor/ckeditor.php';
$ckeditor = new CKEditor();
$ckeditor->basePath = 'ckeditor/';
$ckeditor->config['filebrowserBrowseUrl'] = '/ckfinder/ckfinder.html';
$ckeditor->config['filebrowserImageBrowseUrl'] = '/ckfinder/ckfinder.html?type=Images';
$ckeditor->config['filebrowserFlashBrowseUrl'] = '/ckfinder/ckfinder.html?type=Flash';
$ckeditor->config['filebrowserUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
$ckeditor->config['filebrowserImageUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
$ckeditor->config['filebrowserFlashUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
$ckeditor->config['toolbar'] = array(
    array('Source', '-',
        'NewPage', 'Preview', 'Templates', '-',
        'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-',
        'Undo', 'Redo', '-',
        'Find', 'Replace', '-',
        'SelectAll', 'RemoveFormat', '-',
        'Maximize', 'ShowBlocks'),
    '/',
    
    array('Format', 'Font', 'FontSize', '-',
        'TextColor', 'BGColor') ,
     
    array('Bold', 'Italic', 'Underline', 'Strike', '-',
        'Subscript', 'Superscript', '-',
        'NumberedList', 'BulletedList', '-',
        'Outdent', 'Indent', 'Blockquote', '-',
        'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', '-'
    ),   array('Link', 'Unlink', 'Anchor', '-',
        'Image', 'Flash', 'Table', 'HorizontalRule', 'SpecialChar', 'Smiley'
    )

);
$ckeditor->config['contentsLangDirection'] = 'rtl';
$ckeditor->config['skin'] ='office2013';
?>
<html xmlns="http://www.w3.org/1999/xhtml" >

    <head>
        <title>مدرسه غیرانتفاهی شفق</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--        <link href="Styles/css/blueimp-gallery.min.css" rel="stylesheet" type="text/css"/>-->
        <!--        <link href="Styles/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <link href="Styles/css/demo-ie8.css" rel="stylesheet" type="text/css"/>
        <link href="Styles/css/demo.css" rel="stylesheet" type="text/css"/>
        <link href="Styles/Style.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="../Images/students.ico" />
        <script src="Scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

        <script type="text/javascript" language="javascript">
            $(document).ready(function () {
                $('.Nav li').hover(
                        function () {
                            $('ul', this).stop().slideDown(100);
                        },
                        function () {
                            $('ul', this).stop().slideUp(100);
                        });
            });
        </script>

