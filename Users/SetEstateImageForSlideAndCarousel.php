<?php
require_once '../Classes/EstateEx.inc';
require_once '../Classes/PriceTypeEx.inc';
require_once '../Classes/PriceUnitEx.inc';
require_once '../Classes/EstateTypeEx.inc';
require_once '../Classes/BrokerEx.inc';
?>
<?php
include_once 'Template/header.php';
require_once '../fileman/system.inc.php';
require_once '../fileman/php/functions.inc.php';
?>
<link href="Styles/LightBox.css" rel="stylesheet" type="text/css" />
<script src="Scripts/jquery-lightbox.js" type="text/javascript"></script>
<script src="../fileman/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<link href="../fileman/css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript">

    function openCustomRoxy() {
        $('#CustomPanelSlide').dialog({modal: true, width: 875, height: 600});
    }
    function closeCustomRoxy() {
        $('#CustomPanelSlide').dialog('close');
        $('#CustomPanelCarousel').dialog('close');
    }
    function openCustomRoxy2() {
        $('#CustomPanelCarousel').dialog({modal: true, width: 875, height: 600});
    }

</script>

<?php
include_once 'Template/menu.php';
?>


<?php
$id = "";
$cm = "add";
$title = "";
$comment = "";
$address = "";
$price = "";
$pricetypeid = "";
$priceunitid = "";
$brokerid = "";
if (isset($_GET['id'])) {

    $cm = "edit";
    $id = $_GET['id'];
    if (file_exists("../Uploads/Estates/" . $id . "/") == FALSE) {
        mkdir("../Uploads/Estates/" . $id . "/", 0777);
        mkdir("../Uploads/Estates/" . $id . "/Images/", 0777);
        mkdir("../Uploads/Estates/" . $id . "/SlideImage/", 0777);
        mkdir("../Uploads/Estates/" . $id . "/CarouselImage/", 0777);
    }
    $_SESSION[SESSION_PATH_KEY] = SITE_ROOT . "/Uploads/Estates/" . $id . "/Images/";
    $estate = new Estate();
    $estate = EstateEx::GetOneEstate($id);
    $title = $estate->Title;
    $comment = $estate->Comment;
    $address = $estate->Address;
    $price = $estate->TotalPrice;
    $brokerid = $estate->Broker->BrokerId;



    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . SITE_ROOT . "/Uploads/Estates/" . $estate->EstateId . "/SlideImage/";
    $rpath = SITE_ROOT . "/Uploads/Estates/" . $estate->EstateId . "/SlideImage/";
    $path = str_replace('//', '/', $path);
    $path = str_replace('\\', '/', $path);
    $files = scandir($path);
    $fpathslide = "";
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $fpathslide = $rpath . "/" . $file;
            $fpathslide = str_replace('//', '/', $fpathslide);
            $fpathslide = str_replace('\\', '/', $fpathslide);
            break;
        }
    }

    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . SITE_ROOT . "/Uploads/Estates/" . $estate->EstateId . "/CarouselImage/";
    $rpath = SITE_ROOT . "/Uploads/Estates/" . $estate->EstateId . "/CarouselImage/";
    $path = str_replace('//', '/', $path);
    $path = str_replace('\\', '/', $path);
    $files = scandir($path);
    $fpathcarousel = "";
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $fpathcarousel = $rpath . "/" . $file;
            $fpathcarousel = str_replace('//', '/', $fpathcarousel);
            $fpathcarousel = str_replace('\\', '/', $fpathcarousel);
            break;
        }
    }
}
//echo $classRoom->Name;
?>
<form method="post" action="DoSetImagesForSlideAndCarousel.php">

    <table style="border: 3px solid red;width: 90%; border-collapse: collapse">
        <tr>
            <th>اسلاید</th>
            <th>کاروزل</th>
        </tr>
        <tr>
            <td>
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
                <input type="hidden" id="slide" name="slide"  value="<?php echo $fpathslide; ?>"  />
                <a href="javascript:openCustomRoxy()"><img style="border: 1px solid black;" width="300" src="<?php echo $fpathslide; ?>" id="customRoxyImageSlide" /></a>
                <div id="CustomPanelSlide" style="display: none; width: 960px;height: 600px;">
                    <iframe src="../fileman/setfiles.php?integration=custom&type=files&txtFieldId=slide&image=customRoxyImageSlide" style="width:100%;height:100%" frameborder="0">
                    </iframe>
                </div>
            </td>
            <td>
                <input type="hidden" id="carousel" name="carousel" value="<?php echo $fpathcarousel; ?>"  />
                <a href="javascript:openCustomRoxy2()">
                    <img style="border: 1px solid black;" width="300" src="<?php echo $fpathcarousel; ?>" id="customRoxyImageCarousel" />
                </a>
                <div id="CustomPanelCarousel" style="display: none; width: 960px;height: 600px;">
                    <iframe src="../fileman/setfiles.php?integration=custom&type=files&txtFieldId=carousel&image=customRoxyImageCarousel" style="width:100%;height:100%" frameborder="0">
                    </iframe>
                </div>
            </td>    
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" id="submit" name="submit" style=" width: 100%;" value="ثبت" />
            </td>
        </tr>
    </table>

</form>

<?php
include_once 'Template/footer.php';
?>

