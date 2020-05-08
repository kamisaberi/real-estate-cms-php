<?php
require_once 'Classes/EstateEx.inc';
$estates = EstateEx::GetEstatesForMainBox();
$restates = array_chunk($estates, 4);
?>
<div class="carousel">
    <div class="carouselwrap">
        <?php
        if (count($estates) > 0) {
            echo "<ul id = 'carousel'>";
        }
        foreach ($estates as $estate) {
            $path = $_SERVER['DOCUMENT_ROOT'] . '/' . SITE_ROOT . "/Uploads/Estates/" . $estate->EstateId . "/CarouselImage/";
            $rpath = SITE_ROOT . "/Uploads/Estates/" . $estate->EstateId . "/CarouselImage/";
            //echo $path. "<br/>";
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
            if ($fpath == '')
                continue;

            echo '<li>';

            echo "<a href='Estate/id/" . $estate->EstateId . "/title/" . implode("-", explode(" ", $estate->Title)) . ".htm'>";
            ?>
            <img src="<?php echo $fpath ?>" alt="" title="<?php echo $estate->Title . "  :  " . number_format($estate->TotalPrice) . " تومان ";
            ?>" />
                 <?php
                 echo '</a>';
                 echo '</li>';
             }
             if (count($estates) > 0) {
                 echo "</ul>";
             }
             ?>
    </div>
</div>
