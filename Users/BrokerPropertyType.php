<?php
require_once '../Classes/BrokerPropertyTypeEx.inc';
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
    echo $id;
    $brokerPropertyType = new BrokerPropertyType();
    $brokerPropertyType = BrokerPropertyTypeEx::GetOneBrokerPropertyType($id);
    $name= $brokerPropertyType->Name;
    $comment = $brokerPropertyType->Comment;
}
//echo $brokerPropertyType->Name;
?>
<form method="post" id="form1" name="form1" action="UpdateBrokerPropertyType.php" >
    <input type="hidden" name="brokertypeid" id="brokertypeid" value='<?php echo $id; ?>' />
    <input type="hidden" name="command" id="command" value='<?php echo $cm; ?>' />
    <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable">
        <tr>
            <td colspan="2">BrokerPropertyType Form</td>
        </tr>
        <tr>
            <td>نام:</td>
            <td><input type="text" name="name" id="name" value="<?php echo $name ?>"  /></td>
        </tr>
        <tr>
            <td>توضیحات:</td>
            <td><input type="text" name="comment" id="comment" value="<?php echo $comment ?>" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="button" id="button" value="ثبت" /></td>
        </tr>
    </table>
</form> 


<?php
include_once 'Template/footer.php';
?>

