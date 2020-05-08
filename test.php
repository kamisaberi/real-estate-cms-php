


<?php

include_once 'Template/header.php';
include_once 'Template/menu.php';
require_once 'fileman/system.inc.php';
require_once 'fileman/php/functions.inc.php';

$_SESSION[SESSION_PATH_KEY]="/RealEstates/Uploads/Test/";
?>


<script src="fileman/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<link href="fileman/css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">

    function openCustomRoxy2() {
        $('#roxyCustomPanel2').dialog({modal: true, width: 875, height: 600});
    }
    function closeCustomRoxy2() {
        $('#roxyCustomPanel2').dialog('close');
    }
</script>

<form method="post" action="DoRestore.php">

<input type="text" id="file" name="file" style="border:1px solid #ccc;cursor:pointer;padding:4px;width:80%;direction: ltr; text-align: left" value="Select a file"  />
<input type="button" style="display: inline; width: 90px;" id="getfile" name="getfile" value="انتخاب فایل" onclick="openCustomRoxy2()" />
<div id="roxyCustomPanel2" style="display: block; width: 960px;height: 600px;">
    <iframe src="fileman/index.php?integration=custom&type=files&txtFieldId=file" style="width:100%;height:100%" frameborder="0">
    </iframe>
</div>
<input type="submit" id="submit" name="submit" style=" width: 300px;" value="باز گر داندن اطلاعات" />
</form>



<?php

include_once 'Template/footer.php';

?>

