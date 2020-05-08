<?php
require_once '../Classes/EstateEx.inc';
require_once '../Classes/BrokerEx.inc';
require_once '../Classes/BrokerUserEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';
//echo 'sadaddadasd';
?>
<div class="ContainerTitleBox">
    <img src="Images/Theme/TopBoxImg.png" width="40" height="40" alt="" title="" />
    <h3>
        مشاهده اطلاعات املاک
    </h3>
</div>
            <div class="ContainerMainBox">
<?php
//$termid = OptionEx::GetValue("ActiveTerm");
if ($_SESSION['UserType'] == "Admin") {
    echo "<a href='Estate.php'  class='SubmitButton'>ثبت   کلاس جدید </a>";
    echo "<a href='DisplayEstatesForSlideShow.php'  class='SubmitButton'>انتخاب املاک جهت اسلاید</a>";
    echo "<a href='DisplayEstatesForCarousel.php'  class='SubmitButton'>انتخاب املاک جهت اسلاید</a>";
    $estates = EstateEx::Fill();
} elseif ($_SESSION['UserType'] == "Broker") {
    $v = $_SESSION['User'];
    $brokeruser = new BrokerUser();
    $brokeruser = BrokerUserEx::GetOneBrokerUserBasedOnUsername($v);
    //echo "sdsdasd:" .$brokeruser->Broker . "<br />";
    $estates = EstateEx::GetEstatesForBroker($brokeruser->Broker);
    $name = $brokeruser->Name . " " . $brokeruser->Family;
    ?>
    <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable">
        <tr>
            <td>
                <?php echo $name; ?>
            </td>
        </tr>
    </table>

    <?php
    echo "<a href='Estate.php'  class='SubmitButton'>ثبت   کلاس جدید </a>";
}
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> عنوان </th>";
//echo "<th>توضیحات  </th>";
echo "<th>آدرس </th>";
echo "<th>قیمت کل </th>";
echo "<th>سند</th>";
//echo "<th>نوع قیمت گذاری</th>";
//echo "<th> واحد قیمت</th>";
if ($_SESSION['UserType'] == "Admin") {
    echo "<th>بنگاه ثبت کننده</th>";
}
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";
echo "<th>آپلود تصاویر</th>";
echo "<th>انتخاب تصویر</th>";

echo "</tr>";
foreach ($estates as $estate) {
    echo "<tr>";
    echo "<td>" . $estate->EstateId . "</td>";
    echo "<td>" . $estate->Title . "</td>";
    //echo "<td>" . $estate->Comment . "</td>";

    echo "<td>" . $estate->Address . "</td>";
    echo "<td>" . number_format($estate->TotalPrice) . " تومان" . "</td>";
    echo "<td>" . $estate->Document->Name . "</td>";
    if ($_SESSION['UserType'] == "Admin") {
        echo "<td>" . $estate->Broker->Name . "</td>";
    }
    echo "<td><a href='Estate.php?cm=edit&id=" . $estate->EstateId . "' class='EditItem' > ویرایش </a></td>";
    echo "<td><a href='DeleteEstate.php?id=" . $estate->EstateId . "' class='DeleteItem' >حذف</a></td>";
    echo "<td><a href='EstateImages.php?id=" . $estate->EstateId . "' class='UploadItem' >آپلود تصاویر</a></td>";
    echo "<td><a href='SetEstateImageForSlideAndCarousel.php?id=" . $estate->EstateId . "' class='UploadItem' >انتخاب تصویر</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
//include_once '../Pages/DisplayEstates.php';
?>
<?php
include_once 'Template/footer.php';
?>

