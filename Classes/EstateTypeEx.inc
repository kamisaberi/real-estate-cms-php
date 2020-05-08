<?php

require_once 'EstateType.inc';

//use DataAccess;
/**
 * Description of EstateType
 *
 * @author kami
 */
class EstateTypeEx {

    public static function Insert(EstateType $estateType) {
        $SQL = "INSERT INTO EstateTypes (Name,Comment) VALUES ('" . $estateType->Name . "','" . $estateType->Comment  . "')";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new EstateType();

    public static function Update(EstateType $estateType) {
        $SQL = "UPDATE EstateTypes SET Name = '" . $estateType->Name . "',Comment = '" . $estateType->Comment .  "' WHERE EstateTypeId=" . $estateType->EstateTypeId;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function UpdateByCodeMelli(EstateType $estateType) {
        $SQL = "UPDATE EstateTypes SET Name = '" . $estateType->Name . "',Family = '" . $estateType->Family . "',Passwd= '" . md5($estateType->Passwd) . "' WHERE CodeMelli=" . $estateType->CodeMelli;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Delete(EstateType $estateType) {
        $SQL = "DELETE FROM EstateTypes WHERE EstateTypeId=" . $estateType->EstateTypeId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM EstateTypes ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $EstateTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $t = new EstateType();
            $t->EstateTypeId = $row['EstateTypeId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            $EstateTypes[$i] = $t;
            $i++;
        }
        return $EstateTypes;
    }

    public static function GetOneEstateType($Id) {
        $SQL = "SELECT * FROM EstateTypes WHERE EstateTypeId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new EstateType();
            $t->EstateTypeId = $row['EstateTypeId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            return $t;
        }
    }

    public static function GetOnEstateTypeBasedOnCoeMelli($codemelli) {
        $SQL = "SELECT * FROM EstateTypes WHERE CodeMelli= '" . $codemelli . "'";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new EstateType();
            $t->EstateTypeId = $row['EstateTypeId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->CodeMelli = $row['CodeMelli'];
            $t->Passwd = $row['Passwd'];
            return $t;
        }
    }

    public static function GetEstateTypesForTeacher($teacherId) {
        $SQL = "SELECT * FROM EstateTypes INNER  JOIN Grades On EstateTypes.EstateTypeId = Grades.EstateType INNER JOIN  ClassRooms On Grades.ClassRoom = ClassRooms.ClassRoomId  WHERE ClassRooms.Teacher = " . $teacherId;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $classRooms = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new ClassRoom();
            $t->ClassRoomId = $row['ClassRoomId'];
            $t->Name = $row['Name'];
            $t->Term = $row['Term'];
            $t->Lecture = $row['Lecture'];
            $t->Saal = $row['Saal'];
            $classRooms[$i] = $t;
            $i++;
        }
        return $classRooms;
    }

    public static function AssignClassRooms(EstateType $estateType, $ClassRooms) {
        //echo $estateType->EstateTypeId . "<br/>";
        $SQL = "DELETE FROM EstateTypesClassRooms WHERE EstateType=" . $estateType->EstateTypeId;
        $db = new DataAccess();
        $db->Execute($SQL);
        foreach ($ClassRooms as $class) {
            //echo $class . "<br/>";
            $SQL = "INSERT INTO EstateTypesClassRooms (EstateType,ClassRoom) VALUES (" . $estateType->EstateTypeId . "," . $class . ")";
            $db = new DataAccess();
            $db->Execute($SQL);
        }
    }

    public static function AssignTerms(EstateType $estateType, $Terms) {
        //echo $estateType->EstateTypeId . "<br/>";
        foreach ($Terms as $term) {
            //echo $class . "<br/>";
            $SQL = "INSERT INTO EstateTypesTerms (EstateType,Term) VALUES (" . $estateType->EstateTypeId . "," . $term . ")";
            $db = new DataAccess();
            $db->Execute($SQL);
        }
    }

    public static function GetEstateTypesOfActiveTermForClassRoom($classroomId, $termId) {
        $SQL = "SELECT
ClassRooms.Lecture AS `ClassRoom.Lecture`,
ClassRooms.Saal AS `ClassRoom.Saal`,
ClassRooms.Teacher AS `ClassRoom.Teacher`,
ClassRooms.`Name` AS `ClassRoom.Name`,
EstateTypes.`Name` AS `EstateType.Name`,
EstateTypes.Family AS `EstateType.Family`,
EstateTypes.CodeMelli AS `EstateType.CodeMelli`,
EstateTypes.EstateTypeId AS `EstateType.EstateTypeId`,
ClassRooms.ClassRoomId AS `ClassRoom.ClassRoomId`,
ClassRooms.Term AS `ClassRoom.Term`,
EstateTypes.Passwd AS `EstateType.Passwd`,
EstateTypesClassRooms.EstateTypeClassRoomId AS `EstateTypeClassRoom.EstateTypeClassRoomId`,
EstateTypesClassRooms.EstateType AS `EstateTypeClassRoom.EstateType`,
EstateTypesClassRooms.ClassRoom AS `EstateTypeClassRoom.ClassRoom`,
Lectures.LectureId AS `Lecture.LectureId`,
Lectures.`Name` AS `Lecture.Name`,
Lectures.TedadVahed AS `Lecture.TedadVahed`,
Lectures.Tozihat AS `Lecture.Tozihat`,
Teachers.TeacherId AS `Teacher.TeacherId`,
Teachers.`Name` AS `Teacher.Name`,
Teachers.Family AS `Teacher.Family`,
Teachers.Username AS `Teacher.UserName`,
Teachers.Passwd AS `Teacher.Passwd`,
Terms.TermId AS `Term.TermId`,
Terms.SalShoroo AS `Term.SalShoroo`,
Terms.SalPayan AS 'Term.SalPayan',
Terms.NimSal AS `Term.NimSal`,
Terms.Tozihat AS `Term.Tozihat`
FROM
ClassRooms
INNER JOIN EstateTypesClassRooms ON ClassRooms.ClassRoomId = EstateTypesClassRooms.ClassRoom
INNER JOIN EstateTypes ON EstateTypes.EstateTypeId = EstateTypesClassRooms.EstateType
INNER JOIN Lectures ON Lectures.LectureId = ClassRooms.Lecture
INNER JOIN Teachers ON Teachers.TeacherId = ClassRooms.Teacher
INNER JOIN Terms ON Terms.TermId = ClassRooms.Term
WHERE
ClassRooms.ClassRoomId =" . $classroomId . " AND ClassRooms.Term= " . $termId . " ";

        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $EstateTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $estateType = new EstateType();
            $estateType->EstateTypeId = $row['EstateType.EstateTypeId'];
            $estateType->Name = $row['EstateType.Name'];
            $estateType->Family = $row['EstateType.Family'];
            $estateType->CodeMelli = $row['EstateType.CodeMelli'];
            $estateType->Passwd = $row['EstateType.Passwd'];
            $EstateTypes[$i] = $estateType;
            $i++;
        }
        return $EstateTypes;
    }

    public static function GetEstateTypesOfActiveTermForTeacher($teacherId, $termId) {
        $SQL = "SELECT
ClassRooms.Lecture AS `ClassRoom.Lecture`,
ClassRooms.Saal AS `ClassRoom.Saal`,
ClassRooms.Teacher AS `ClassRoom.Teacher`,
ClassRooms.`Name` AS `ClassRoom.Name`,
EstateTypes.`Name` AS `EstateType.Name`,
EstateTypes.Family AS `EstateType.Family`,
EstateTypes.CodeMelli AS `EstateType.CodeMelli`,
EstateTypes.EstateTypeId AS `EstateType.EstateTypeId`,
ClassRooms.ClassRoomId AS `ClassRoom.ClassRoomId`,
ClassRooms.Term AS `ClassRoom.Term`,
EstateTypes.Passwd AS `EstateType.Passwd`,
EstateTypesClassRooms.EstateTypeClassRoomId AS `EstateTypeClassRoom.EstateTypeClassRoomId`,
EstateTypesClassRooms.EstateType AS `EstateTypeClassRoom.EstateType`,
EstateTypesClassRooms.ClassRoom AS `EstateTypeClassRoom.ClassRoom`,
Lectures.LectureId AS `Lecture.LectureId`,
Lectures.`Name` AS `Lecture.Name`,
Lectures.TedadVahed AS `Lecture.TedadVahed`,
Lectures.Tozihat AS `Lecture.Tozihat`,
Teachers.TeacherId AS `Teacher.TeacherId`,
Teachers.`Name` AS `Teacher.Name`,
Teachers.Family AS `Teacher.Family`,
Teachers.Username AS `Teacher.UserName`,
Teachers.Passwd AS `Teacher.Passwd`,
Terms.TermId AS `Term.TermId`,
Terms.SalShoroo AS `Term.SalShoroo`,
Terms.SalPayan AS 'Term.SalPayan',
Terms.NimSal AS `Term.NimSal`,
Terms.Tozihat AS `Term.Tozihat`
FROM
ClassRooms
INNER JOIN EstateTypesClassRooms ON ClassRooms.ClassRoomId = EstateTypesClassRooms.ClassRoom
INNER JOIN EstateTypes ON EstateTypes.EstateTypeId = EstateTypesClassRooms.EstateType
INNER JOIN Lectures ON Lectures.LectureId = ClassRooms.Lecture
INNER JOIN Teachers ON Teachers.TeacherId = ClassRooms.Teacher
INNER JOIN Terms ON Terms.TermId = ClassRooms.Term  
WHERE
ClassRooms.Teacher=" . $teacherId . " AND ClassRooms.Term= " . $termId . " ";
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $EstateTypes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $estateType = new EstateType();
            $estateType->EstateTypeId = $row['EstateType.EstateTypeId'];
            $estateType->Name = $row['EstateType.Name'];
            $estateType->Family = $row['EstateType.Family'];
            $estateType->CodeMelli = $row['EstateType.CodeMelli'];
            $estateType->Passwd = $row['EstateType.Passwd'];
            $EstateTypes[$i] = $estateType;
            $i++;
        }
        return $EstateTypes;
    }

    public static function CheckEstateTypeIsRegisterInClassRoomForActiveTerm($classroomId, $estateTypeId) {
        $SQL = "SELECT * FROM EstateTypesClassRooms WHERE EstateType=" . $estateTypeId. " AND ClassRoom=" . $classroomId ;
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0)
            return TRUE;
        return FALSE;
    }

    public static function Login($username, $password) {
        $SQL = "SELECT * FROM EstateTypes WHERE CodeMelli= '" . $username . "' AND Passwd='" . md5($password) . "'";
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0)
            return TRUE;
        return FALSE;
    }

    public static function CheckExists($codemelli) {
        $SQL = "SELECT * FROM EstateTypes WHERE CodeMelli= '" . $codemelli . "'";
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0)
            return TRUE;
        return FALSE;
    }

//put your code here
}
