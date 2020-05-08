<?php
require_once '../Classes/UserEx.inc';
require_once '../Classes/LoggedinUserEx.inc';
require_once '../Classes/BrokerEx.inc';
require_once '../Classes/BrokerUserEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!--<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>-->
<!--<textarea class="ckeditor" name="editor"></textarea>-->
<!--<form method="get" id="form1" action="Test.php">
<?php
include_once '../ckeditor/ckeditor.php';
$ckeditor = new CKEditor();
$ckeditor->basePath = 'ckeditor/';
$ckeditor->config['filebrowserBrowseUrl'] = '/ckfinder/ckfinder.html';
$ckeditor->config['filebrowserImageBrowseUrl'] = '/ckfinder/ckfinder.html?type=Images';
$ckeditor->config['filebrowserFlashBrowseUrl'] = '/ckfinder/ckfinder.html?type=Flash';
$ckeditor->config['filebrowserUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
$ckeditor->config['filebrowserImageUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
$ckeditor->config['filebrowserFlashUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
$ckeditor->editor('CKEditor1');
?>
    <input type="submit" id="s1" name="s" />
    </form>-->
<?php
if (!isset($_SESSION['UserType'])) {
    $_SESSION['UserType'] = "";
}

if (($_SESSION['UserType'] == "Admin" || $_SESSION['UserType'] == "Broker" || $_SESSION['UserType'] == "Client") 
        && LoggedinUserEx::CheckVisitorIsALoggedinUser($_COOKIE['User'], $_COOKIE['Password'])) {
    ?>
    <table  border="0" align="center">
    <!--        <tr>
            <td>
                <p class="SubmitButton">
    <?php
    echo $_SESSION['User'];
    ?>
                </p>
            </td>
        </tr>-->

        <tr>
            <td>

                <a href="Index.php"  class="SubmitButton">کنترل پانل</a>
            </td>
        </tr>
    </table>
    <?php
} else {
    ?>

    <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable" >
    <?php
    if (isset($_SESSION['LoginError'])) {
        echo "<tr><td style='color:red;'>" . $_SESSION['LoginError'] . "</td></tr>";
        unset($_SESSION['LoginError']);
    }
    ?>
        <tr>
            <td>
                <form id="form1" name="form1" method="post" action="CheckLogin.php">
                    <table width="510" border="0" align="center">
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
            </td>
        </tr>
    </table>

    <?php
}
?>
<?php
include_once 'Template/footer.php';
?>

