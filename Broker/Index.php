<?php

require_once '../Classes/TeacherEx.inc';
?>
<?php

include_once 'Template/header.php';
include_once 'Template/menu.php';
?>

<?php

//include_once 'Pages/DisplayTeachers.php';
?>
<table border="1" cellpadding="0" cellspacing="0" class="Center">
    <tr>
        <td>
            <div class="Item">
                <a href="Students.php">
                    <img src="../Images/Student.png" class="ItemPictureBox" alt="معلم" /></a> <span>دانش آموزان</span>
            </div>
        </td>
        <td>
            <div class="Item">
                <a href="ClassRooms.php">
                    <img src="../Images/ClassRoom.png" class="ItemPictureBox" alt="کلاس" /></a> <span>کلاس</span>
            </div>
        </td>
    </tr>
</table>
<?php

include_once 'Template/footer.php';
?>

