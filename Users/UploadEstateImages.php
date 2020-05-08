<?php
require_once '../Classes/EstateEx.inc';
require_once '../Classes/PriceTypeEx.inc';
require_once '../Classes/PriceUnitEx.inc';
require_once '../Classes/EstateTypeEx.inc';
require_once '../Classes/BrokerEx.inc';
?>
<?php
include_once 'Template/header.php';
?>
<link href="Styles/LightBox.css" rel="stylesheet" type="text/css" />
<script src="Scripts/jquery-lightbox.js" type="text/javascript"></script>

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
    if (file_exists("../Uploads/Estates/" . $id . "/") == FALSE) {
        mkdir("../Uploads/Estates/" . $id . "/", 0777);
        mkdir("../Uploads/Estates/" . $id . "/Big/", 0777);
        mkdir("../Uploads/Estates/" . $id . "/Medium/", 0777);
        mkdir("../Uploads/Estates/" . $id . "/Small/", 0777);
    }

    $estate = new Estate();
    $estate = EstateEx::GetOneEstate($id);
    $title = $estate->Title;
    $comment = $estate->Comment;
    $address = $estate->Address;
    $price = $estate->TotalPrice;
    //$pricetypeid = $estate->PriceType->PriceTypeId;
    //$estatetypeid = $estate->EstateType->EstateTypeId;
    //$priceunitid = $estate->PriceUnit->PriceUnitId;
    $brokerid = $estate->Broker->BrokerId;
}
//echo $classRoom->Name;
?>
<div class="ViewTable">
    <form method="post" action="UploadImage.php" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
        <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable">
            <tr>
                <td>
                    <input type="file" id="files" name="files" />        
                </td>
                <td>
                    <input type="submit" id="submit" name="submit" value="ارسال" style="width: 100px"/>        
                </td>
            </tr>
        </table>
    </form>
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
    sort($bfiles,SORT_NUMERIC);
    if (count($bfiles) > 0) {
        echo "<table><tbody>";
    }

    $rfiles = array_chunk($bfiles, 3);
    foreach ($rfiles as $mfiles) {
        echo '<tr>';
        foreach ($mfiles as $file) {

            echo "<td><form method='post' action='DeleteImage.php' >
                <input type='hidden' id='id' name='id' value='$id' />
                    <input type='hidden' id='files' name='files' value='$file' />
                            <div class = 'MoreImage'>
                            
                                <a href = '" . $bpath . $file . "'>
                                    <img src = '" . $path . 'Small/' . $file . "' width = '218' height = '163' alt = ''
                                         title = '' /></a>";
            echo "</div>" . "<div style='text-align:center;width:218px;'><input type='submit' value='حذف' style='width:100px;'/></div></form>";


            echo "</td>";
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

<?php
include_once 'Template/footer.php';
?>

