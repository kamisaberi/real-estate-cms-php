
<?php

require_once '../Classes/StudentEx.inc';
require_once '../Classes/ClassRoomEx.inc';
require_once '../Classes/GradeEx.inc';

if (isset($_POST['classroom'])) {
    $students= $_POST['students'];
    $values= $_POST['values'];
    $id = $_POST['classroom'];
    GradeEx::AssignGradesForStudents($students, $values ,$id );
    header("Location: ClassRooms.php");
}
if (isset($_POST['student'])) {
    $students= $_POST['students'];
    $values= $_POST['values'];
    $id = $_POST['classroom'];
    GradeEx::AssignGradesForStudents($students, $values ,$id );
    header("Location: ClassRooms.php");
}




//if (isset($_POST['classroom'])) {
//    $students = $_POST['students'];
//    $id = $_POST['classroom'];
//    $classroom = new ClassRoom();
//    $classroom->ClassRoomId = $id;
//    ClassRoomEx::AssignStudents($classroom, $students);
//    //header("Location: ClassRooms.php");
//}



//echo implode(', ',$classes);



