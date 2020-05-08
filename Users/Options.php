<?php
require_once '../Classes/ClassRoomEx.inc';
require_once '../Classes/LectureEx.inc';
require_once '../Classes/TeacherEx.inc';
require_once '../Classes/TermEx.inc';
require_once '../Classes/GradeTypeEx.inc';
require_once '../Classes/OptionEx.inc';
?>
<?php
include_once 'Template/header.php';
include_once 'Template/menu.php';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
}

?>

<?php
$activeterm = OptionEx::GetValue("ActiveTerm");
$recordnumber = OptionEx::GetValue("NumberOfRecords");
?>
<form method="post" id="form1" name="form1" action="UpdateOptions.php" >
<!--    <input type="hidden" name="classroomid" id="classroomid" value='<?php echo $id; ?>' />
    <input type="hidden" name="command" id="command" value='<?php echo $cm; ?>' />-->
    <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable">
        <tr>
            <td colspan="2">Form</td>
        </tr>
        <tr>
            <td>ترم:</td>
            <td>
                <select name="termid" id="termid" >
                    <?php
                    $terms = TermEx::Fill();
                    echo count($terms);
                    foreach ($terms as $term) {
                        $selected = "";
                        if ($activeterm == $term->TermId) {
                            $selected = "selected";
                        }
                        echo "<option value='" . $term->TermId . "' " . $selected . ">" . $term->SalShoroo . " - " . $term->SalPayan . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>تعداد رکورد در هر صفحه:</td>
            <td>
                <select name="recordnumber" id="recordnumber" >
                    <?php
                    $numbers = array(20,30,50,100);
                    foreach ($numbers as $number) {
                        $selected = "";
                        if ($recordnumber == $number) {
                            $selected = "selected";
                        }
                        echo "<option value='" . $number . "' " . $selected . ">" . $number . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>



        <tr>
            <td colspan="2"><input type="submit" name="button" id="button" value="Submit" /></td>
        </tr>
    </table>
</form> 


<?php
include_once 'Template/footer.php';
?>

