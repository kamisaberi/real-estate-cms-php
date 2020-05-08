<?php
require_once 'Classes/EstateEx.inc';
$estates = EstateEx::GetEstatesForSlideShow();
//if (count($estates) > 0) {
//    echo count($estates);
//}
//foreach ($estates as $estate) {
//
//    $path = "/Uploads/Estates/" . $estate->EstateId . "/Banner/";
//    if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
//        $bpath = $_SERVER['DOCUMENT_ROOT'] . "/RealEstates" . $path;
//        //$path = "/RealEstates" . $path;
//    } else {
//        $bpath = $_SERVER['DOCUMENT_ROOT'] . $path;
//    }
//    //echo $bpath;
//    $bfiles = preg_grep('~\b.(jpeg|jpg|png|JPG)$~', scandir($bpath));
//    sort($bfiles);
//    //print_r($bfiles);
//    $file = "Uploads/Estates/" . $estate->EstateId . "/Banner/" . $bfiles[0];
//    //echo $file ."<br />";
//
//    $sfiles = preg_grep('~\s.(jpeg|jpg|png|JPG)$~', scandir($bpath));
//    sort($sfiles);
//    //print_r($sfiles);
//    //$file = "Uploads/Estates/" . $estate->EstateId . "/Banner/" . $sfiles[0];
//    //echo $file;
//}
?>

<div class="slide">
    <div class="container">
        <div class="wt-rotator">
            <div class="screen">
            </div>
            <div class="c-panel">
                <div class="thumbnails">
                    <?php
                    if (count($estates) > 0) {
                        echo '<ul>';
                    }
                    foreach ($estates as $estate) {
                        echo'<li>';
                        $path = "/Uploads/Estates/" . $estate->EstateId . "/Banner/";
                        if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
                            $bpath = $_SERVER['DOCUMENT_ROOT'] . "/RealEstates" . $path;
                            //$path = "/RealEstates" . $path;
                        } else {
                            $bpath = $_SERVER['DOCUMENT_ROOT'] . $path;
                        }
                        $bfiles = preg_grep('~\b.(jpeg|jpg|png|JPG)$~', scandir($bpath));
                        sort($bfiles);
                        $file = "Uploads/Estates/" . $estate->EstateId . "/Banner/" . $bfiles[0];
                        echo "<a href='" . $file . "' title=''>";
                        ?>
                        <a href="Estate.php?id=<?php echo $estate->EstateId; ?>"></a> 
                        <?php
                        $file = "Uploads/Estates/" . $estate->EstateId . "/Banner/" . $bfiles[1];
                        echo "<img src = '" . $file . "' alt = '' /></a>";
                        ?>
                        <div class='inner-text'>
                            <h2>
                                <?php echo $estate->Title; ?></h2>

                            <span><?php echo "<ul>" . $estate->Comment . "</ul>"; ?></span>
                            <span><?php echo "قیمت:" . " " .  number_format($estate->TotalPrice). " تومان "; ?></span>
                        </div>
                        <?php
                        echo'</li>';
                    }
                    ?>

                    <?php
                    if (count($estates) > 0) {
                        echo '</ul>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="search" ></div>