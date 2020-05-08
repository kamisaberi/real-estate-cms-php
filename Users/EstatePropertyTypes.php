<?php
require_once '../Classes/EstatePropertyTypeEx.inc';
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
        مشاهده خاصیت های املاک
    </h3>
</div>
            <div class="ContainerMainBox">

<a href="EstatePropertyType.php"   class="SubmitButton">ثبت خاصیت های املاک  </a>
<?php
$estatePropertyTypes = EstatePropertyTypeEx::Fill();
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام </th>";
echo "<th>توضیحات</th>";
echo "<th>مقادیر</th>";
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";
echo "</tr>";
foreach ($estatePropertyTypes as $estatePropertyType) {
    echo "<tr>";
    echo "<td>" . $estatePropertyType->EstatePropertyTypeId . "</td>";
    echo "<td>" . $estatePropertyType->Name . "</td>";
    echo "<td>" . $estatePropertyType->Comment . "</td>";
    echo "<td>" . $estatePropertyType->Values . "</td>";
    echo "<td><a href='EstatePropertyType.php?cm=edit&id=" . $estatePropertyType->EstatePropertyTypeId . "'  class='EditItem' > ویرایش </a></td>";
    echo "<td><a href='DeleteEstatePropertyType.php?id=" . $estatePropertyType->EstatePropertyTypeId . "'  class='DeleteItem' >حذف</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
//include_once '../Pages/DisplayEstatePropertyTypes.php';
?>
<?php
include_once 'Template/footer.php';
?>

