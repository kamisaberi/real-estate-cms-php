<?php
require_once '../Classes/DocumentEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
}
?>
<div class="ContainerTitleBox">
    <img src="Images/Theme/TopBoxImg.png" width="40" height="40" alt="" title="" />
    <h3>
        مشاهده  انواع اسناد
    </h3>
</div>
            <div class="ContainerMainBox">



<a href="Document.php"   class="SubmitButton">ثبت نوع نمرات </a>
<?php
$documents = DocumentEx::Fill();
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام </th>";
echo "<th>توضیحات</th>";
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";
echo "</tr>";
foreach ($documents as $document) {
    echo "<tr>";
    echo "<td>" . $document->DocumentId . "</td>";
    echo "<td>" . $document->Name . "</td>";
    echo "<td>" . $document->Comment . "</td>";
    echo "<td><a href='Document.php?cm=edit&id=" . $document->DocumentId . "'  class='EditItem' > ویرایش </a></td>";
    echo "<td><a href='DeleteDocument.php?id=" . $document->DocumentId . "'  class='DeleteItem' >حذف</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
//include_once '../Pages/DisplayDocuments.php';
?>
<?php
include_once 'Template/footer.php';
?>

