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
    }
    ?>
    <form method="post" action="SetEstatesForCarousel.php">
        <?php
        echo " <table border='1' cellpadding='5' cellspacing='5' class='ViewTable'>";
        echo "<tr>";
        echo "<th> تصویر اسلاید</th>";
        echo "<th> انتخاب</th>";
//        echo "<th> شناسه</th>";
        echo "<th> عنوان </th>";
        echo "<th>آدرس </th>";
        echo "<th>قیمت کل </th>";
        echo "<th>سند</th>";
        if ($_SESSION['UserType'] == "Admin") {
            echo "<th>بنگاه ثبت کننده</th>";
        }
        echo "</tr>";
        foreach ($estates as $estate) {
            echo "<tr>";

            $checked = "";
            $slideshow = FALSE;

            if ($estate->DisplayType->DisplayTypeId == 2) {
                $slideshow = TRUE;
            }

            if ($estate->DisplayType->DisplayTypeId == 3) {
                $checked = "checked";
            }


            $path = $_SERVER['DOCUMENT_ROOT'] . '/' . SITE_ROOT . "/Uploads/Estates/" . $estate->EstateId . "/CarouselImage/";
            $rpath = SITE_ROOT . "/Uploads/Estates/" . $estate->EstateId . "/CarouselImage/";
            $path = str_replace('//', '/', $path);
            $path = str_replace('\\', '/', $path);
            $files = scandir($path);
            $fpath = "";
            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    $fpath = $rpath . "/" . $file;
                    $fpath = str_replace('//', '/', $fpath);
                    $fpath = str_replace('\\', '/', $fpath);
                    break;
                }
            }
            if ($slideshow == TRUE) {
                echo "<td style='background-color:red;'>";
            } else {
                echo "<td>";
            }
            //echo "<td>";
            if ($fpath != '') {
                echo "<img src='$fpath' width='70' />";
            }
            echo "</td>";
            echo "<td>";
            if ($fpath != '') {
                echo "<input id='slides[]' name='slides[]' type='checkbox' style='margin:2px;' value='" . $estate->EstateId . "' $checked />";
            }
            echo "</td>";
//            echo "<td>" . $estate->EstateId . "</td>";
            echo "<td>" . $estate->Title . "</td>";
            //echo "<td>" . $estate->Comment . "</td>";

            echo "<td>" . $estate->Address . "</td>";
            echo "<td>" . number_format($estate->TotalPrice) . " تومان" . "</td>";
            echo "<td>" . $estate->Document->Name . "</td>";
            if ($_SESSION['UserType'] == "Admin") {
                echo "<td>" . $estate->Broker->Name . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>

        <input type="submit" name="button" id="button" value="ثبت" />

    </form>
    <?php
    echo "</div>";
//include_once '../Pages/DisplayEstates.php';
    ?>
    <?php
    include_once 'Template/footer.php';
    ?>

