<?php
require_once '../Classes/PriceTypeEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';


if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
}

?>
<a href="PriceType.php"   class="SubmitButton">ثبت نوع نمرات </a>
<?php
$priceTypes = PriceTypeEx::Fill();
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام </th>";
echo "<th>توضیحات</th>";
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";
echo "</tr>";
foreach ($priceTypes as $priceType) {
    echo "<tr>";
    echo "<td>" . $priceType->PriceTypeId . "</td>";
    echo "<td>" . $priceType->Name . "</td>";
    echo "<td>" . $priceType->Comment . "</td>";
    echo "<td><a href='PriceType.php?cm=edit&id=" . $priceType->PriceTypeId . "'  class='Edit' > ویرایش </a></td>";
    echo "<td><a href='DeletePriceType.php?id=" . $priceType->PriceTypeId . "'  class='Delete' >حذف</a></td>";
    echo "</tr>";
}
echo "</table>";
//include_once '../Pages/DisplayPriceTypes.php';
?>
<?php
include_once 'Template/footer.php';
?>

