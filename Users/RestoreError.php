<?php

?>
<?php

include_once 'Template/header.php';
include_once 'Template/menu.php';
if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
}

?>
<table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable">
    <tr>
        <td colspan="2" style="color: red;">باز گر داندن اطلاعات موفقیت آمیز نبود.</td>
    </tr>
</table>
<?php

include_once 'Template/footer.php';
?>

