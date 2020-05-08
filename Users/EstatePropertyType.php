<?php
require_once '../Classes/EstatePropertyTypeEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';
?>

<?php
$id = "";
$cm = "add";
$name = "";
$comment = "";
$values="";
if (isset($_GET['id'])) {

    $cm = "edit";
    $id = $_GET['id'];
    $estatePropertyType = new EstatePropertyType();
    $estatePropertyType = EstatePropertyTypeEx::GetOneEstatePropertyType($id);
    $name= $estatePropertyType->Name;
    $comment = $estatePropertyType->Comment;
    $values=$estatePropertyType->Values;
}
//echo $estatePropertyType->Name;
?>
<form method="post" id="form1" name="form1" action="UpdateEstatePropertyType.php" >
    <input type="hidden" name="estatetypeid" id="estatetypeid" value='<?php echo $id; ?>' />
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
                <td colspan="2">
                    <div class="FormTitle">
                        <h3>
                            فرم ثبت املاک
                        </h3>
                    </div>
                </td>
            </tr>
            <tr>
                <td><label class="lblPosition">نام:</label></td>
                <td><input type="text" name="name" id="name" class="SmallTXT" value="<?php echo $name ?>"  /></td>
            </tr>
            <tr>
                <td><label class="lblPosition">توضیحات:</label></td>
                <td><input type="text" name="comment" id="comment" class="bigTXT" value="<?php echo $comment ?>" /></td>
            </tr>
            <tr>
                <td><label class="lblPosition">مقادیر:</label></td>
                <td><input type="text" name="values" id="values" class="bigTXT" value="<?php echo $values ?>" /></td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" name="button" id="button" value="ثبت" /></td>
            </tr>
        </table>
    </div>
</form> 


<?php
include_once 'Template/footer.php';
?>

