<?php
require_once '../Classes/PriceUnitEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';


if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
}

?>
<a href="PriceUnit.php"   class="SubmitButton">ثبت نوع نمرات </a>
<?php
$priceUnits = PriceUnitEx::Fill();
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام </th>";
echo "<th>توضیحات</th>";
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";
echo "</tr>";
foreach ($priceUnits as $priceUnit) {
    echo "<tr>";
    echo "<td>" . $priceUnit->PriceUnitId . "</td>";
    echo "<td>" . $priceUnit->Name . "</td>";
    echo "<td>" . $priceUnit->Comment . "</td>";
    echo "<td><a href='PriceUnit.php?cm=edit&id=" . $priceUnit->PriceUnitId . "'  class='Edit' > ویرایش </a></td>";
    echo "<td><a href='DeletePriceUnit.php?id=" . $priceUnit->PriceUnitId . "'  class='Delete' >حذف</a></td>";
    echo "</tr>";
}
echo "</table>";
//include_once '../Pages/DisplayPriceUnits.php';
?>
<?php
include_once 'Template/footer.php';
?>

