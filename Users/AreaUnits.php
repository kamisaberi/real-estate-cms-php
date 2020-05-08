<?php
require_once '../Classes/AreaUnitEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';
?>
<a href="AreaUnit.php"   class="SubmitButton">ثبت نوع نمرات </a>
<?php
$areaUnits = AreaUnitEx::Fill();
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام </th>";
echo "<th>توضیحات</th>";
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";
echo "</tr>";
foreach ($areaUnits as $areaUnit) {
    echo "<tr>";
    echo "<td>" . $areaUnit->AreaUnitId . "</td>";
    echo "<td>" . $areaUnit->Name . "</td>";
    echo "<td>" . $areaUnit->Comment . "</td>";
    echo "<td><a href='AreaUnit.php?cm=edit&id=" . $areaUnit->AreaUnitId . "'  class='Edit' > ویرایش </a></td>";
    echo "<td><a href='DeleteAreaUnit.php?id=" . $areaUnit->AreaUnitId . "'  class='Delete' >حذف</a></td>";
    echo "</tr>";
}
echo "</table>";
//include_once '../Pages/DisplayAreaUnits.php';
?>
<?php
include_once 'Template/footer.php';
?>

