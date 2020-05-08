<?php
require_once 'Classes/EstateEx.inc';
require_once 'Classes/EstatePropertyEx.inc';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$estate = new Estate();
$estate = EstateEx::GetOneEstate($id);
$properties = EstatePropertyEx::GetPropertiesOfEstate($id);

//echo $estate->Title ;
?>
<?php
include_once 'Template/estate_header.php';
$commnets = explode("<li>", $estate->Comment);
$str1 = implode("", $commnets);
$commnets = explode("</li>", $str1);
$commnets = array_map('trim', $commnets);
$str1 = implode(",", $commnets);
?>

<meta name="description" content="<?php echo OptionEx::GetValue("SiteDescription") . " , " . $estate->Title . $str1; ?>"/>
<meta name="keywords" content="<?php echo OptionEx::GetValue("SiteKeywords"); ?>"/>
<?php
include_once 'Template/menu.php';
?>
<div class="Content">
    <div class="ListEstateTopBox">

        <?php
        if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
            ?>
            <img src="/RealEstate/Images/Theme/TopBoxImg.png" width="40" height="40" alt="" title="" />
            <?php
        } else {
            ?>
            <img src="/Images/Theme/TopBoxImg.png" width="40" height="40" alt="" title="" />
            <?php
        }
        ?>



        <h3>
            <?php echo $estate->Title ?></h3>
    </div>
    <div class="ListEstateMainBox">
        <div class="EstateDetails">
            <p>
                شناسه ملک :<span><?php echo $estate->EstateId ?></span></p>
            <p>
                نوع ملک :<span> <?php echo $estate->EstateType->Name ?></span></p>
            <p>
                متراژ کلی:<span> <?php echo $estate->TotalArea . " متر "  ?> </span></p>
            <p>
               متراژ ساختمان:<span> <?php echo $estate->BuildingArea . " متر "  ?> </span></p>
            <p>
                قیمت :<span><?php echo number_format($estate->TotalPrice) . " تومان " ?></span></p>
            <p>
                سند :<span><?php echo $estate->Document->Name  ?></span></p>

            <?php
            foreach ($properties as $property) {
                ?>

                <p>
                    <?php echo $property->EstatePropertyType->Name . ":"; ?><span><?php echo $property->Value; ?></span></p>
                <?php
            }
            ?>



        </div>
        <div class="EstateImage">
            <div class="EstateImageBox">
                <?php
                if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
                    ?>
                    <img src="/RealEstate//Images/Estate-MediumImages/MediumImage.JPG" width="320" height="210" alt="" title="" />
                    <?php
                } else {
                    ?>
                    <img src="/Images/Estate-MediumImages/MediumImage.JPG" width="320" height="210" alt="" title="" />
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="EstateMoreDetails">
            <p>
                توضیحات بیشتر :</p>
            <ul>
                <?php echo $estate->Comment; ?>
            </ul>
        </div>
        <div id="GalleryContainer">
            <?php
            $path = "/Uploads/Estates/" . $estate->EstateId . "/";
            $bpath = "/Uploads/Estates/" . $estate->EstateId . "/Big/";
            if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
                $fbpath = $_SERVER['DOCUMENT_ROOT'] . "/RealEstate" . $bpath;
                $bpath = "/RealEstate" . $bpath;
                $path = "/RealEstate" . $path;
            } else {
                $fbpath = $_SERVER['DOCUMENT_ROOT'] . $bpath;
            }
            $bfiles = preg_grep('~\.(jpeg|jpg|png)$~', scandir($fbpath));
            sort($bfiles, SORT_NUMERIC);
            if (count($bfiles) > 0) {
                echo "<table><tbody>";
            }

            $rfiles = array_chunk($bfiles, 3);
            foreach ($rfiles as $mfiles) {
                echo '<tr>';
                foreach ($mfiles as $file) {

                    echo "<td>
                            <div class = 'MoreImage'>

                                <a href = '" . $bpath . $file . "'>
                                    <img src = '" . $path . 'Small/' . $file . "' width = '218' height = '163' alt = ''
                                         title = '' /></a>
                            </div>
                        </td>";
                }
                echo '</tr>';
            }
            ?>
            <?php
            if (count($bfiles) > 0) {
                echo "</tbody></table>";
            }
            ?>
        </div>
    </div>
</div>
<?php
//$test =parse_ini_file("Config/Connection.ini",FALSE);
//print_r(parse_ini_file("Config/Connection.ini",FALSE));
//echo $test['host'];
include_once 'Template/footer.php';
?>

