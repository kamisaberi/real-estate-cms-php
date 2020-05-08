<?php
require_once '../Classes/BrokerUserEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';
?>

<?php
$id = "";
$cm = "add";
$name = "";
$family = "";
$mobile = "";
$username = "";
$passwd = "";

if (isset($_GET['id'])) {

    $cm = "edit";
    $id = $_GET['id'];
    $brokerUser = new BrokerUser();
    $brokerUser = BrokerUserEx::GetOneBrokerUser($id);
    $name = $brokerUser->Name;
    $family = $brokerUser->Family;
    $mobile = $brokerUser->Mobile;
    $username = $brokerUser->Username;
    $passwd = $brokerUser->Passwd;
}
//echo $teacher->Name;
?>
<form method="post" id="form1" name="form1" action="UpdateBrokerUser.php" >
    <input type="hidden" name="brokeruserid" id="brokeruserid" value='<?php echo $id; ?>' />
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
                <td><label>نام خانوادگی:</label></td>
                <td><input type="text" name="family" id="family" value="<?php echo $family ?>"  /></td>
            </tr>
            <tr>
                <td> <label>تلفن همراه:</label></td>
                <td><input type="text" name="mobile" id="mobile" value="<?php echo $mobile ?>" /></td>
            </tr>
            <tr>
                <td><label>نام کاربری: </label></td>
                <td><input type="text" name="username" id="username" value="<?php echo $username ?>" /></td>
            </tr>
            <tr>
                <td><label>رمز عبور:</label></td>
                <td><input type="text" name="passwd" id="passwd" value="" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="button" id="button" value="Submit" /></td>
            </tr>
        </tbody>
    </table>
</form> 


<?php
include_once 'Template/footer.php';
?>

