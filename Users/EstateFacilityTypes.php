<?php
require_once '../Classes/EstateFacilityTypeEx.inc';
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
        مشاهده امکانات  املاک
    </h3>
</div>
            <div class="ContainerMainBox">

<a href="EstateFacilityType.php"   class="SubmitButton">ثبت خاصیت های املاک  </a>
<?php
$estateFacilityTypes = EstateFacilityTypeEx::Fill();
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام </th>";
echo "<th>توضیحات</th>";
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";
echo "</tr>";
foreach ($estateFacilityTypes as $estateFacilityType) {
    echo "<tr>";
    echo "<td>" . $estateFacilityType->EstateFacilityTypeId . "</td>";
    echo "<td>" . $estateFacilityType->Name . "</td>";
    echo "<td>" . $estateFacilityType->Comment . "</td>";
    echo "<td><a href='EstateFacilityType.php?cm=edit&id=" . $estateFacilityType->EstateFacilityTypeId . "'  class='EditItem' > ویرایش </a></td>";
    echo "<td><a href='DeleteEstateFacilityType.php?id=" . $estateFacilityType->EstateFacilityTypeId . "'  class='DeleteItem' >حذف</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
//include_once '../Pages/DisplayEstateFacilityTypes.php';
?>
<?php
include_once 'Template/footer.php';
?>

