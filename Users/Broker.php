<?php
require_once '../Classes/BrokerEx.inc';
require_once '../Classes/BrokerPropertyEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';
?>

<?php
$cm = "add";
$name = "";
$address = "";

if (isset($_GET['id'])) {

    $cm = "edit";
    $id = $_GET['id'];
    $broker = new Broker();
    $broker = BrokerEx::GetOneBroker($id);
    $name = $broker->Name;
    $address = $broker->Address;
}
//echo $teacher->Name;
?>
<form method="post" id="form1" name="form1" action="UpdateBroker.php" >
    <input type="hidden" name="teacherid" id="teacherid" value='<?php echo $id; ?>' />
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
                <td><label class="lblPosition">نام:</label></td>
                <td><input type="text" name="name" id="name" class="SmallTXT" value="<?php echo $name ?>"  /></td>
            </tr>
            <tr>
                <td> <label class="lblPosition">آدرس:</label></td>
                <td colspan="2"><input type="text" name="address" id="address" class="bigTXT" value="<?php echo $address ?>" /></td>
            </tr>
            <?php
            if ($cm == "edit") {
                ?>
                <tr>
                    <td colspan="2">
                        <?php
                        $brokerproperties = BrokerPropertyEx::GetPropertiesForBroker($id);
                        ?>                        
                        <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable" >
                            <?php
                            foreach ($brokerproperties as $brokerproperty) {
                                echo '<tr>';
                                echo '<td>' . $brokerproperty->Name . '</td>';
                                echo '<td>' . $brokerproperty->Value . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                    </td>
                </tr>
                <?php
            }
            ?>



            <tr>
                <td colspan="2" ><input type="submit" name="button" id="button" value="ثبت" /></td>
            </tr>

        </table>
    </div>
</form> 


<?php
include_once 'Template/footer.php';
?>

