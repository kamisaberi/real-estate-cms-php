<?php
require_once '../Classes/BrokerPropertyTypeEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';
if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
}

?>
<a href="BrokerPropertyType.php"   class="SubmitButton">ثبت خاصیت های املاک  </a>
<?php
$brokerPropertyTypes = BrokerPropertyTypeEx::Fill();
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام </th>";
echo "<th>توضیحات</th>";
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";
echo "</tr>";
foreach ($brokerPropertyTypes as $brokerPropertyType) {
    echo "<tr>";
    echo "<td>" . $brokerPropertyType->BrokerPropertyTypeId . "</td>";
    echo "<td>" . $brokerPropertyType->Name . "</td>";
    echo "<td>" . $brokerPropertyType->Comment . "</td>";
    echo "<td><a href='BrokerPropertyType.php?cm=edit&id=" . $brokerPropertyType->BrokerPropertyTypeId . "'  class='Edit' > ویرایش </a></td>";
    echo "<td><a href='DeleteBrokerPropertyType.php?id=" . $brokerPropertyType->BrokerPropertyTypeId . "'  class='Delete' >حذف</a></td>";
    echo "</tr>";
}
echo "</table>";
//include_once '../Pages/DisplayBrokerPropertyTypes.php';
?>
<?php
include_once 'Template/footer.php';
?>

