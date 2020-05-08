<?php
require_once '../Classes/AreaUnitEx.inc';
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
    $areaUnit = new AreaUnit();
    $areaUnit = AreaUnitEx::GetOneAreaUnit($id);
    $name= $areaUnit->Name;
    $comment = $areaUnit->Comment;
}
//echo $areaUnit->Name;
?>
<form method="post" id="form1" name="form1" action="UpdateAreaUnit.php" >
    <input type="hidden" name="areatypeid" id="areatypeid" value='<?php echo $id; ?>' />
    <input type="hidden" name="command" id="command" value='<?php echo $cm; ?>' />
    <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable">
        <tr>
            <td colspan="2">AreaUnit Form</td>
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

