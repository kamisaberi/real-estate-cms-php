<?php
require_once '../Classes/PriceTypeEx.inc';
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
if (isset($_GET['id'])) {

    $cm = "edit";
    $id = $_GET['id'];
    $priceType = new PriceType();
    $priceType = PriceTypeEx::GetOnePriceType($id);
    $name= $priceType->Name;
    $comment = $priceType->Comment;
}
//echo $priceType->Name;
?>
<form method="post" id="form1" name="form1" action="UpdatePriceType.php" >
    <input type="hidden" name="pricetypeid" id="pricetypeid" value='<?php echo $id; ?>' />
    <input type="hidden" name="command" id="command" value='<?php echo $cm; ?>' />
    <table  border="0" cellpadding="0" cellspacing="0"  class="FormsContainer">
        <tbody>
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
            <td><label>نام:</label></td>
            <td><input type="text" name="name" id="name" value="<?php echo $name ?>"  /></td>
        </tr>
        <tr>
            <td><label>توضیحات:</label></td>
            <td><input type="text" name="comment" id="comment" value="<?php echo $comment ?>" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="button" id="button" value="ثبت" /></td>
        </tr>
        </tbody>
    </table>
</form> 


<?php
include_once 'Template/footer.php';
?>

