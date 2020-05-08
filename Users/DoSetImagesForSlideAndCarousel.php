
<?php

require_once '../Classes/PriceUnitEx.inc';
require_once '../Classes/LoggedinUserEx.inc';
require_once '../fileman/system.inc.php';
require_once '../fileman/php/functions.inc.php';

$tmp = json_decode(file_get_contents('../Config/site.json'), true);
if ($tmp) {
    foreach ($tmp as $k => $v)
        define($k, $v);
} else
    die('Error parsing configuration');


if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}


$slide = $_POST['slide'];
$carousel = $_POST['carousel'];
$id= $_POST['id'];
//echo $id;
//$_SESSION[SESSION_PATH_KEY] = SITE_ROOT . "/Uploads/Estates/" . $id . "/SlideImage/";
//$slide = $_SERVER['DOCUMENT_ROOT'] . '/' . $slide;
//$slide = str_replace("//", "/", $slide);
$path = SITE_ROOT . "/Uploads/Estates/" . $id . "/SlideImage/";
$path=  fixPath($path);
echo $path. "<br/>";
$files = glob( $path . '*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

$path = SITE_ROOT . "/Uploads/Estates/" . $id . "/CarouselImage/";
$path=  fixPath($path);
echo $path. "<br/>";
$files = glob( $path . '*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}



$slide= fixPath($slide);
$carousel= fixPath($carousel);
//$carousel= $_SERVER['DOCUMENT_ROOT'] . '/' . $carousel;
//$carousel= str_replace("//", "/", $carousel);
$sfilePath = str_replace('/Images/', '/SlideImage/', $slide) ;
$cfilePath = str_replace('/Images/', '/CarouselImage/', $carousel) ;
RoxyImage::CropCenter($slide, $sfilePath, 448, 300);
RoxyImage::CropCenter($carousel, $cfilePath, 230, 180);

header("Location: Estates.php");



