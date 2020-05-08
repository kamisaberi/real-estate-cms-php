<?php
require_once '../Classes/BrokerUserEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';
?>
<a href="BrokerUser.php"  class="SubmitButton">ثبت درس   جدید </a>
<?php
if (isset($_GET['broker'])) {
    $brokerid = $_GET['broker'];
    $brokerUsers = BrokerUserEx::GetBrokerUsersForBroker($brokerid);
} else {
    $brokerUsers = BrokerUserEx::Fill();
}

echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام  </th>";
echo "<th> نام خانوادگی </th>";
echo "<th>تلفن همراه </th>";
echo "<th> نام کاربری  </th>";
echo "<th>رمز عبور  </th>";
echo "<th>ویرایش</th>";
echo "<th>حذف </th>";

echo "</tr>";
foreach ($brokerUsers as $brokerUser) {
    echo "<tr>";
    echo "<td>" . $brokerUser->BrokerUserId . "</td>";
    echo "<td>" . $brokerUser->Name . "</td>";
    echo "<td>" . $brokerUser->Family . "</td>";
    echo "<td>" . $brokerUser->Mobile . "</td>";
    echo "<td>" . $brokerUser->Username . "</td>";
    echo "<td>" . $brokerUser->Passwd . "</td>";
    echo "<td><a href='BrokerUser.php?cm=edit&id=" . $brokerUser->BrokerUserId . "'  class='Edit' > ویرایش </a></td>";
    echo "<td><a href='DeleteBrokerUser.php?id=" . $brokerUser->BrokerUserId . "'  class='Delete' >حذف</a></td>";

    echo "</tr>";
}
echo "</table>";
//include_once '../Pages/DisplayBrokerUsers.php';
?>
<?php
include_once 'Template/footer.php';
?>

