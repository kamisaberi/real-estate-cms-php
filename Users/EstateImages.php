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

<script language="javascript" type="text/javascript">
    $(document).ready(function() {
        $('#GalleryContainer a').lightBox();
    });
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
   // $_SESSION[SESSION_PATH_KEY]="/RealEstates/Uploads/Estates/" . $id . "/";
    //echo $_SESSION[SESSION_PATH_KEY] ;
    //$_SESSION[SESSION_PATH_KEY]="../Uploads/Estates/" . $id . "/";
    if (file_exists("../Uploads/Estates/" . $id . "/") == FALSE) {
        mkdir("../Uploads/Estates/" . $id . "/", 0777);
        mkdir("../Uploads/Estates/" . $id . "/Images/", 0777);
        mkdir("../Uploads/Estates/" . $id . "/SlideImage/", 0777);
        mkdir("../Uploads/Estates/" . $id . "/CarouselImage/", 0777);
    }    
    $_SESSION[SESSION_PATH_KEY]=SITE_ROOT . "/Uploads/Estates/" . $id . "/Images/";
    $estate = new Estate();
    $estate = EstateEx::GetOneEstate($id);
    $title = $estate->Title;
    $comment = $estate->Comment;
    $address = $estate->Address;
    $price = $estate->TotalPrice;
    $brokerid = $estate->Broker->BrokerId;
}
//echo $classRoom->Name;
?>
<div id="roxyCustomPanel2" style="display: block; width: 948px;height: 600px; margin: 5px;border: 1px solid black;">
    <iframe src="../fileman/index.php?integration=custom&type=files&txtFieldId=file" style="width:100%;height:100%" frameborder="0">
    </iframe>
</div>

<?php
include_once 'Template/footer.php';
?>

