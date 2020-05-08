<?php

require_once 'Document.inc';

//use DataAccess;
/**
 * Description of Document
 *
 * @author kami
 */
class DocumentEx {

    public static function Insert(Document $document) {
        $SQL = "INSERT INTO Documents (Name,Comment) VALUES ('" . $document->Name . "','" . $document->Comment  . "')";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new Document();

    public static function Update(Document $document) {
        $SQL = "UPDATE Documents SET Name = '" . $document->Name . "',Comment = '" . $document->Comment .  "' WHERE DocumentId=" . $document->DocumentId;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function UpdateByCodeMelli(Document $document) {
        $SQL = "UPDATE Documents SET Name = '" . $document->Name . "',Family = '" . $document->Family . "',Passwd= '" . md5($document->Passwd) . "' WHERE CodeMelli=" . $document->CodeMelli;
        echo $SQL;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Delete(Document $document) {
        $SQL = "DELETE FROM Documents WHERE DocumentId=" . $document->DocumentId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM Documents ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $Documents = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $t = new Document();
            $t->DocumentId = $row['DocumentId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            $Documents[$i] = $t;
            $i++;
        }
        return $Documents;
    }

    public static function GetOneDocument($Id) {
        $SQL = "SELECT * FROM Documents WHERE DocumentId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new Document();
            $t->DocumentId = $row['DocumentId'];
            $t->Name = $row['Name'];
            $t->Comment = $row['Comment'];
            return $t;
        }
    }

    public static function GetOnDocumentBasedOnCoeMelli($codemelli) {
        $SQL = "SELECT * FROM Documents WHERE CodeMelli= '" . $codemelli . "'";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new Document();
            $t->DocumentId = $row['DocumentId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->CodeMelli = $row['CodeMelli'];
            $t->Passwd = $row['Passwd'];
            return $t;
        }
    }

    public static function GetDocumentsForTeacher($teacherId) {
        $SQL = "SELECT * FROM Documents INNER  JOIN Grades On Documents.DocumentId = Grades.Document INNER JOIN  ClassRooms On Grades.ClassRoom = ClassRooms.ClassRoomId  WHERE ClassRooms.Teacher = " . $teacherId;
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

    public static function AssignClassRooms(Document $document, $ClassRooms) {
        //echo $document->DocumentId . "<br/>";
        $SQL = "DELETE FROM DocumentsClassRooms WHERE Document=" . $document->DocumentId;
        $db = new DataAccess();
        $db->Execute($SQL);
        foreach ($ClassRooms as $class) {
            //echo $class . "<br/>";
            $SQL = "INSERT INTO DocumentsClassRooms (Document,ClassRoom) VALUES (" . $document->DocumentId . "," . $class . ")";
            $db = new DataAccess();
            $db->Execute($SQL);
        }
    }

    public static function AssignTerms(Document $document, $Terms) {
        //echo $document->DocumentId . "<br/>";
        foreach ($Terms as $term) {
            //echo $class . "<br/>";
            $SQL = "INSERT INTO DocumentsTerms (Document,Term) VALUES (" . $document->DocumentId . "," . $term . ")";
            $db = new DataAccess();
            $db->Execute($SQL);
        }
    }

    public static function GetDocumentsOfActiveTermForClassRoom($classroomId, $termId) {
        $SQL = "SELECT
ClassRooms.Lecture AS `ClassRoom.Lecture`,
ClassRooms.Saal AS `ClassRoom.Saal`,
ClassRooms.Teacher AS `ClassRoom.Teacher`,
ClassRooms.`Name` AS `ClassRoom.Name`,
Documents.`Name` AS `Document.Name`,
Documents.Family AS `Document.Family`,
Documents.CodeMelli AS `Document.CodeMelli`,
Documents.DocumentId AS `Document.DocumentId`,
ClassRooms.ClassRoomId AS `ClassRoom.ClassRoomId`,
ClassRooms.Term AS `ClassRoom.Term`,
Documents.Passwd AS `Document.Passwd`,
DocumentsClassRooms.DocumentClassRoomId AS `DocumentClassRoom.DocumentClassRoomId`,
DocumentsClassRooms.Document AS `DocumentClassRoom.Document`,
DocumentsClassRooms.ClassRoom AS `DocumentClassRoom.ClassRoom`,
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
INNER JOIN DocumentsClassRooms ON ClassRooms.ClassRoomId = DocumentsClassRooms.ClassRoom
INNER JOIN Documents ON Documents.DocumentId = DocumentsClassRooms.Document
INNER JOIN Lectures ON Lectures.LectureId = ClassRooms.Lecture
INNER JOIN Teachers ON Teachers.TeacherId = ClassRooms.Teacher
INNER JOIN Terms ON Terms.TermId = ClassRooms.Term
WHERE
ClassRooms.ClassRoomId =" . $classroomId . " AND ClassRooms.Term= " . $termId . " ";

        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $Documents = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $document = new Document();
            $document->DocumentId = $row['Document.DocumentId'];
            $document->Name = $row['Document.Name'];
            $document->Family = $row['Document.Family'];
            $document->CodeMelli = $row['Document.CodeMelli'];
            $document->Passwd = $row['Document.Passwd'];
            $Documents[$i] = $document;
            $i++;
        }
        return $Documents;
    }

    public static function GetDocumentsOfActiveTermForTeacher($teacherId, $termId) {
        $SQL = "SELECT
ClassRooms.Lecture AS `ClassRoom.Lecture`,
ClassRooms.Saal AS `ClassRoom.Saal`,
ClassRooms.Teacher AS `ClassRoom.Teacher`,
ClassRooms.`Name` AS `ClassRoom.Name`,
Documents.`Name` AS `Document.Name`,
Documents.Family AS `Document.Family`,
Documents.CodeMelli AS `Document.CodeMelli`,
Documents.DocumentId AS `Document.DocumentId`,
ClassRooms.ClassRoomId AS `ClassRoom.ClassRoomId`,
ClassRooms.Term AS `ClassRoom.Term`,
Documents.Passwd AS `Document.Passwd`,
DocumentsClassRooms.DocumentClassRoomId AS `DocumentClassRoom.DocumentClassRoomId`,
DocumentsClassRooms.Document AS `DocumentClassRoom.Document`,
DocumentsClassRooms.ClassRoom AS `DocumentClassRoom.ClassRoom`,
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
INNER JOIN DocumentsClassRooms ON ClassRooms.ClassRoomId = DocumentsClassRooms.ClassRoom
INNER JOIN Documents ON Documents.DocumentId = DocumentsClassRooms.Document
INNER JOIN Lectures ON Lectures.LectureId = ClassRooms.Lecture
INNER JOIN Teachers ON Teachers.TeacherId = ClassRooms.Teacher
INNER JOIN Terms ON Terms.TermId = ClassRooms.Term  
WHERE
ClassRooms.Teacher=" . $teacherId . " AND ClassRooms.Term= " . $termId . " ";
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $Documents = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $document = new Document();
            $document->DocumentId = $row['Document.DocumentId'];
            $document->Name = $row['Document.Name'];
            $document->Family = $row['Document.Family'];
            $document->CodeMelli = $row['Document.CodeMelli'];
            $document->Passwd = $row['Document.Passwd'];
            $Documents[$i] = $document;
            $i++;
        }
        return $Documents;
    }

    public static function CheckDocumentIsRegisterInClassRoomForActiveTerm($classroomId, $documentId) {
        $SQL = "SELECT * FROM DocumentsClassRooms WHERE Document=" . $documentId. " AND ClassRoom=" . $classroomId ;
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0)
            return TRUE;
        return FALSE;
    }

    public static function Login($username, $password) {
        $SQL = "SELECT * FROM Documents WHERE CodeMelli= '" . $username . "' AND Passwd='" . md5($password) . "'";
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0)
            return TRUE;
        return FALSE;
    }

    public static function CheckExists($codemelli) {
        $SQL = "SELECT * FROM Documents WHERE CodeMelli= '" . $codemelli . "'";
        //echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0)
            return TRUE;
        return FALSE;
    }

//put your code here
}
