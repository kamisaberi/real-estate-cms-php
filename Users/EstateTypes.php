<?php
require_once '../Classes/EstateTypeEx.inc';
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
        مشاهده  انواع املاک
    </h3>
</div>
            <div class="ContainerMainBox">

<a href="EstateType.php"   class="SubmitButton">ثبت نوع نمرات </a>
<?php
$estateTypes = EstateTypeEx::Fill();
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام </th>";
echo "<th>توضیحات</th>";
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";
echo "</tr>";
foreach ($estateTypes as $estateType) {
    echo "<tr>";
    echo "<td>" . $estateType->EstateTypeId . "</td>";
    echo "<td>" . $estateType->Name . "</td>";
    echo "<td>" . $estateType->Comment . "</td>";
    echo "<td><a href='EstateType.php?cm=edit&id=" . $estateType->EstateTypeId . "'  class='EditItem' > ویرایش </a></td>";
    echo "<td><a href='DeleteEstateType.php?id=" . $estateType->EstateTypeId . "'  class='DeleteItem' >حذف</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
//include_once '../Pages/DisplayEstateTypes.php';
?>
<?php
include_once 'Template/footer.php';
?>

