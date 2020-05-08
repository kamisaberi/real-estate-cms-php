<?php

require_once '../Classes/BrokerEx.inc';
?>
<?php

include_once 'Template/header.php';
include_once 'Template/menu.php';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
}

?>

<?php

if ($_SESSION['UserType'] == "Admin") {
    echo "<a href='Broker.php'  class='SubmitButton'> ثبت بنگاه جدید </a>";
    $brokers = BrokerEx::Fill();
}
echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
echo "<tr>";
echo "<th> شناسه</th>";
echo "<th> نام </th>";
echo "<th>آدرس </th>";
//echo "<th>تلفن</th>";
if ($_SESSION['UserType'] == "Admin") {

    echo "<th>ویرایش</th>";
    echo "<th>حذف </th>";
    echo "<th>نمایش کاربران</th>";
}
echo "</tr>";
if ($_SESSION['UserType'] == "Admin") {
    foreach ($brokers as $broker) {
        echo "<tr>";
        echo "<td>" . $broker->BrokerId . "</td>";
        echo "<td>" . $broker->Name . "</td>";
        echo "<td>" . $broker->Address . "</td>";
        echo "<td><a href='Broker.php?cm=edit&id=" . $broker->BrokerId . "' class='Edit' > ویرایش </a></td>";
        echo "<td><a href='DeleteBroker.php?id=" . $broker->BrokerId . "' class='Delete' >حذف</a></td>";
        echo "<td><a href='BrokerUsers.php?broker=" . $broker->BrokerId . "'  >نمایش کاربران</a></td>";
        echo "</tr>";
    }
} elseif ($_SESSION['UserType'] == "Client") {
    foreach ($classrooms as $classroom) {
        echo "<tr>";
        echo "<td>" . $classroom->Teacher->TeacherId . "</td>";
        echo "<td>" . $classroom->Teacher->Name . "</td>";
        echo "<td>" . $classroom->Teacher->Family . "</td>";
        echo "<td>" . $classroom->Teacher->CodeMelli . "</td>";
        //    echo "<td>" . $broker->Username . "</td>";
        //    echo "<td>" . $broker->Passwd . "</td>";
        //    echo "<td><a href='Teacher.php?cm=edit&id=" . $broker->TeacherId . "' class='Edit' > ویرایش </a></td>";
        //    echo "<td><a href='DeleteTeacher.php?id=" . $broker->TeacherId . "' class='Delete' >حذف</a></td>";

        echo "</tr>";
    }
}
echo "</table>";
//include_once '../Pages/DisplayTeachers.php';
?>
<?php
//echo $_SERVER['DOCUMENT_ROOT'];
include_once 'Template/footer.php';
?>

