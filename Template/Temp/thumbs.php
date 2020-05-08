<?php
require_once 'Classes/EstateEx.inc';
$festates = EstateEx::GetEstatesForMainBox();
$restates = array_chunk($festates, 4);
?>
<div class="ListEstateTopBox">
    <?php
    if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
        ?>
        <img src="/RealEstates/Images/Theme/TopBoxImg.png" width="40" height="40" alt="" />
        <?php
    } else {
        ?>
        <img src="/Images/Theme/TopBoxImg.png" width="40" height="40" alt="" />
        <?php
    }
    ?>





    <h3>
        پیشنهادات فروش
    </h3>
</div>
<div class="ListEstateMainBox">

    <table>
        <tbody>

            <?php
            $rows = 4;
            foreach ($restates as $estates) {
                echo "<tr>";
                $c = count($estates);
                foreach ($estates as $estate) {

                    $path = "/Uploads/Estates/" . $estate->EstateId . "/";
                    $bpath = "/Uploads/Estates/" . $estate->EstateId . "/Small/";
                    if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
                        $fbpath = $_SERVER['DOCUMENT_ROOT'] . "/RealEstates" . $bpath;
                        $bpath = "/RealEstates" . $bpath;
                        $path = "/RealEstates" . $path;
                    } else {
                        $fbpath = $_SERVER['DOCUMENT_ROOT'] . $bpath;
                    }
//                    echo $fbpath . "<br/>";
                    $bfiles = preg_grep('~\.(jpeg|jpg|png|JPG)$~', scandir($fbpath));
                    sort($bfiles, SORT_NUMERIC);
//                    echo count($bfiles) . "<br/>";
                    $file = $bpath . $bfiles[0];
                    //Estate/id/1/title/home 130 metri.htm
                    echo "<td>
                    <div class='EstateBox'>";
                    //echo "<a href='Estate.php?id=" . $estate->EstateId . "'>" ;
                    echo "<a href='Estate/id/" . $estate->EstateId . "/title/" . implode("-", explode(" ", $estate->Title)) . ".htm'>";
                    echo "<img src='" . $file . "' width='218' height='163' alt='' />
                        </a>
                        <div class='EstateTitle'>
                            <span>" . $estate->Title . "</span>
                        </div>
                    </div>
                </td>";
                }

                for ($i = 1; $i <= 4 - $c; $i++) {
                    echo "<td>
                                <div class='EstateBox'>
                                    <a href='#'>
                                        <img src='' width='218' height='163' alt='' />
                                                                </a>
                                    <div class='EstateTitle'>
                                        <span></span>
                                    </div>
                                </div>
                            </td>";
                }
                echo "</tr>";
                $rows--;
            }

            for ($i = 1; $i <= $rows; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= 4; $j++) {
                    echo "<td>
                                <div class='EstateBox'>
                                    <a href='#'>
<img src='' width='218' height='163' alt='' />                                   
</a>
                                    <div class='EstateTitle'>
                                        <span></span>
                                    </div>
                                </div>
                            </td>";
                }
                echo "</tr>";
            }
            ?>


        </tbody>
    </table>
</div>
</div>
</div>
