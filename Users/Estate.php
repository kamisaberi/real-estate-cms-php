<?php
require_once '../Classes/EstateEx.inc';
require_once '../Classes/PriceTypeEx.inc';
require_once '../Classes/PriceUnitEx.inc';
require_once '../Classes/EstateTypeEx.inc';
require_once '../Classes/EstatePropertyTypeEx.inc';
require_once '../Classes/EstateFacilityTypeEx.inc';
require_once '../Classes/EstatePropertyEx.inc';
require_once '../Classes/EstateFacilityEx.inc';
require_once '../Classes/BrokerEx.inc';
require_once '../Classes/BrokerUserEx.inc';
require_once '../Classes/DocumentEx.inc';
?>
<?php
include_once 'Template/header.php';
?>

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
$totalarea = "";
$buildingarea = "";
$pricetypeid = "";
$priceunitid = "";
$brokerid = "";
$documentid = "";
if (isset($_GET['id'])) {

    $brokeruser = new BrokerUser();
    if ($_SESSION['UserType'] == "Admin") {
        $cm = "edit";
        $id = $_GET['id'];
        $estate = new Estate();
        $estate = EstateEx::GetOneEstate($id);
        $title = $estate->Title;
        $comment = $estate->Comment;
        $address = $estate->Address;
        $price = $estate->TotalPrice;
        $totalarea = $estate->TotalArea;
        $buildingarea = $estate->BuildingArea;
        $estatetypeid = $estate->EstateType->EstateTypeId;
        $brokerid = $estate->Broker->BrokerId;
        $documentid = $estate->Document->DocumentId;
    } elseif ($_SESSION['UserType'] == "Broker") {
        $brokeruser = BrokerUserEx::GetOneBrokerUserBasedOnUsername($_COOKIE['User']);
        $cm = "edit";
        $id = $_GET['id'];
        $estate = new Estate();
        $estate = EstateEx::GetOneEstate($id);
        $title = $estate->Title;
        $comment = $estate->Comment;
        $address = $estate->Address;
        $price = $estate->TotalPrice;
        $estatetypeid = $estate->EstateType->EstateTypeId;
        $brokerid = $estate->Broker->BrokerId;
        $documentid = $estate->Document->DocumentId;
        if ($brokeruser->Broker != $estate->Broker->BrokerId) {
            header("Location: Estates.php");
//die();
        }
    }
//echo $broker->Broker;
}


//echo $classRoom->Name;
?>


<form method="post" id="form1" name="form1" action="UpdateEstate.php" >
    <input type="hidden" name="estateid" id="estateid" value='<?php echo $id; ?>' />
    <input type="hidden" name="command" id="command" value='<?php echo $cm; ?>' />
    <div class="ContainerTitleBox">
        <img src="Images/Theme/TopBoxImg.png" width="40" height="40" alt="" title="" />
        <h3>
            اطلاعات اصلی
        </h3>
    </div>
    <div class="ContainerMainBox">
        <table cellpadding="0" cellspacing="0" border="0" class="FormItemContainer">
            <tr>
                <td>
                    <label class="lblPosition">
                        عنوان:</label>
                </td>
                <td colspan="4">
                    <input type="text" name="title" id="title" value="<?php echo $title ?>" class="bigTXT"  />
                </td>
            </tr>
            <tr>
                <td>
                    <label class="lblPosition">
                        نوع ملک :</label>
                </td>
                <td>
                    <select name="estatetypeid" id="estatetypeid" class="drp drpStyle" >
                        <?php
                        $estatetypes = EstateTypeEx::Fill();
                        foreach ($estatetypes as $estatetype) {
                            $selected = "";
                            if ($estatetypeid == $estatetype->EstateTypeId) {
                                $selected = "selected";
                            }
                            echo "<option value='" . $estatetype->EstateTypeId . "' " . $selected . ">" . $estatetype->Name . "</option>";
                        }
                        ?>
                    </select>

                </td>
                <td>
                    <label class="lblPosition">
                        قیمت :</label>
                </td>
                <td>
                    <input type="text" name="totalprice" id="totalprice" class="SmallTXT"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $price ?>" title="تنها عدد وارد نمایید"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="lblPosition">
                        سند:</label>
                </td>
                <td>
                    <select name="documentid" id="documentid" class="drp drpStyle" >
                        <?php
                        $documnets = DocumentEx::Fill();
                        foreach ($documnets as $document) {
                            $selected = "";
                            if ($documentid == $document->DocumentId) {
                                $selected = "selected";
                            }
                            echo "<option value='" . $document->DocumentId . "' " . $selected . ">" . $document->Name . "</option>";
                        }
                        ?>
                    </select>

                </td>
                <td>
                    <label class="lblPosition">
                        مساحت بنا:</label>
                </td>
                <td>
                    <input type="text" name="buildingarea" id="buildingarea" class="SmallTXT"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $buildingarea ?>" title="تنها عدد وارد نمایید"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="lblPosition">
                        مساحت کل:</label>
                </td>
                <td colspan="2">
                    <input type="text" name="totalarea" id="totalarea" class="SmallTXT" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $totalarea ?>" title="تنها عدد وارد نمایید"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="lblPosition">
                        آدرس :</label>
                </td>
                <td colspan="4">
                    <input type="text" name="address" id="address"  class="bigTXT"  value="<?php echo $address ?>" />
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <label class="lblPosition">
                        توضیحات :</label>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td colspan="4">
                    <textarea id="comment" name="comment" rows="" cols="" class="txtArea"></textarea>
                </td>
            </tr>

            <?php
            if ($_SESSION['UserType'] == "Admin") {
                ?>

                <tr>
                    <td><label>بنگاه:</label></td>
                    <td><select name="brokerid" id="brokerid" class="drp drpStyle" >
                            <?php
                            $brokers = BrokerEx::Fill();
                            foreach ($brokers as $broker) {
                                $selected = "";
                                if ($brokerid == $broker->BrokerId) {
                                    $selected = "selected";
                                }
                                echo "<option value='" . $broker->BrokerId . "' " . $selected . ">" . $broker->Name . "</option>";
                            }
                            ?>
                        </select>
                    </td>

                </tr>
                <?php
            } elseif ($_SESSION['UserType'] == "Broker") {
                ?>
                <input type="hidden" id="brokerid" name="brokerid" value="<?php echo BrokerUserEx::GetOneBrokerUserBasedOnUsername($_COOKIE['User'])->Broker ?>" />
                <?php
            }
            ?>
        </table>
    </div>
    <div class="ContainerTitleBox TopBorder">
        <img src="Images/Theme/TopBoxImg.png" width="40" height="40" alt="" title="" />
        <h3>
            خصوصیات
        </h3>
    </div>
    <div class="ContainerMainBox">
        <table cellpadding="0" cellspacing="0" border="0">
            <?php
            if ($cm == "edit") {
                $properties = EstatePropertyEx::GetPropertiesOfEstate($id);

                //echo count($properties);
                $estatePropertyTypes = EstatePropertyTypeEx::Fill();
                $chunkedestatePropertyTypes = array_chunk($estatePropertyTypes, 2);
                foreach ($chunkedestatePropertyTypes as $chunkedestatePropertyType) {

                    echo "<tr>";
                    foreach ($chunkedestatePropertyType as $estatePropertyType) {
                        $a = -1;
                        echo "<td>";
                        echo "<input type='hidden' name='properties[]' id='properties[]' value='{$estatePropertyType->EstatePropertyTypeId}' />";
                        echo "<label class='lblPosition'>" . $estatePropertyType->Name . ":</label>";



                        for ($j = 0; $j < count($properties); $j++) {
                            if ($properties[$j]->EstatePropertyType->EstatePropertyTypeId == $estatePropertyType->EstatePropertyTypeId) {
                                //echo $properties[$j]->Value;
                                $a = $j;
                                break;
                            }
                        }




                        echo "</td>";

                        echo "<td>";


                        if ($estatePropertyType->Values == '-') {
                            if ($a != -1) {
                                echo "<input type='text' class='SmallTXT'  id='values[]' name='values[]' value='" . $properties[$a]->Value . "' />";
                                //unset($properties[$a]);
                                //array_values($properties);
                            } else {
                                echo "<input type='text' class='SmallTXT' id='values[]' name='values[]' value='' />";
                            }
                        } else {
                            if ($a != -1) {
                                $s = $estatePropertyType->Values;
                                $sars = explode('-', $s);
                                echo "<select class='drp drpStyle'  id='values[]' name='values[]' >";
                                foreach ($sars as $sar) {
                                    $sar = trim($sar);
                                    $selected = "";
                                    //echo $sar."<br/>";
                                    if ($sar == trim($properties[$a]->Value)) {
                                        //echo $sar."<br/>";
                                        $selected = "selected";
                                    }
                                    echo "<option value='$sar' $selected> $sar </option>";
                                }
                                echo '</select>';
                            } else {

                                $s = $estatePropertyType->Values;
                                $sars = explode('-', $s);
                                echo "<select class='drp drpStyle'  id='values[]' name='values[]' >";
                                foreach ($sars as $sar) {
                                    $sar = trim($sar);
                                    echo "<option value='$sar'> $sar </option>";
                                }
                                echo '</select>';
                            }
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                }
            } elseif ($cm == "add") {
                $estatePropertyTypes = EstatePropertyTypeEx::Fill();
                $chunkedestatePropertyTypes = array_chunk($estatePropertyTypes, 2);
                foreach ($chunkedestatePropertyTypes as $chunkedestatePropertyType) {
                    echo "<tr>";
                    foreach ($chunkedestatePropertyType as $estatePropertyType) {
                        echo "<td>";
                        echo "<input type='hidden' name='properties[]' id='properties[]' value='{$estatePropertyType->EstatePropertyTypeId}' />";
                        echo "<label class='lblPosition'>" . $estatePropertyType->Name . ":</label>";
                        echo "</td>";
                        echo "<td>";
                        if ($estatePropertyType->Values == '-') {
                            echo "<input type='text' class='SmallTXT'  id='values[]' name='values[]' value='' />";
                        } else {
                            $s = $estatePropertyType->Values;
                            $sars = explode('-', $s);
                            echo "<select class='drp drpStyle'  id='values[]' name='values[]' >";
                            foreach ($sars as $sar) {
                                $sar = trim($sar);
                                echo "<option value='$sar'> $sar </option>";
                            }

                            echo '</select>';
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

    <div class="ContainerTitleBox TopBorder">
        <img src="Images/Theme/TopBoxImg.png" width="40" height="40" alt="" title="" />
        <h3>
            ویژگی ها
        </h3>
    </div>
    <div class="ContainerMainBox">
        <table cellpadding="0" cellspacing="0" border="0">

<?php
if ($cm == "edit") {
    $facilities = EstateFacilityEx::GetFacilitiesOfEstate($id);
    //echo count($properties);
    $estateFacilityTypes = EstateFacilityTypeEx::Fill();
    $chunkedestateFacilityTypes = array_chunk($estateFacilityTypes, 4);
    foreach ($chunkedestateFacilityTypes as $chunkedestateFacilityType) {
        $checked = "";
        $a = -1;
        echo "<tr>";
        foreach ($chunkedestateFacilityType as $estateFacilityType) {
            echo "<td>";
            for ($j = 0; $j < count($facilities); $j++) {
                if ($facilities[$j]->EstateFacilityType->EstateFacilityTypeId == $estateFacilityType->EstateFacilityTypeId) {
                    $checked = "checked";
                    break;
                }
            }
            echo "<input type='checkbox' name='facilities[]' id='facilities[]'   value='" . $estateFacilityType->EstateFacilityTypeId . "' $checked />:" . $estateFacilityType->Name;
            $checked = "";
            echo "</td>";
        }
        echo "</tr>";
    }
} elseif ($cm == "add") {

    $estateFacilityTypes = EstateFacilityTypeEx::Fill();
    $chunkedestateFacilityTypes = array_chunk($estateFacilityTypes, 4);
    foreach ($chunkedestateFacilityTypes as $chunkedestateFacilityType) {
        echo "<tr>";
        foreach ($chunkedestateFacilityType as $estateFacilityType) {
            echo "<td>";
            echo "<input type='checkbox' name='facilities[]' id='facilities[]' value='" . $estateFacilityType->EstateFacilityTypeId . "' />:" . $estateFacilityType->Name;
            echo "</td>";
        }
        echo "</tr>";
    }
}
?>



        </table>
    </div>
    <tr>
        <td colspan="2"><input type="submit" name="button" id="button" value="ارسال" /></td>
    </tr>

</table>
</form> 


<?php
include_once 'Template/footer.php';
?>

