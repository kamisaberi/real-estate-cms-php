<?php

require_once 'Option.inc';


//use DataAccess;
/**
 * Description of Option
 *
 * @author kami
 */
class OptionEx {

    public static function Insert(Option $option) {
        $SQL = "INSERT INTO Options (Name,Value) VALUES ('" . $option->Name . "','" . $option->Value . "')";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new Option();

    public static function Update(Option $option) {
        $SQL = "UPDATE Options SET Name = '" . $option->Name . "',Value = '" . $option->Value . "' WHERE OptionId=" . $option->OptionId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Delete(Option $option) {
        $SQL = "DELETE FROM Options WHERE OptionId=" . $option->OptionId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Fill() {
        $SQL = "SELECT * FROM Options ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $options = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new Option();
            $t->OptionId = $row['OptionId'];
            $t->SalShoroo = $row['SalShoroo'];
            $t->SalPayan = $row['SalPayan'];
            $t->NimSal = $row['NimSal'];
            $t->Tozihat = $row['Tozihat'];
            $options[$i] = $t;
            $i++;
        }
        return $options;
    }

    public static function GetValue($name) {
        $SQL = "SELECT * FROM Options WHERE Name= '" . $name . "'";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        while ($row = mysqli_fetch_array($result)) {
            return $row['Value'];
        }
        return '';
    }

    public static function SetValue(Option $option) {
        $SQL = "UPDATE Options SET  Value= '" . $option->Value . "'  WHERE Name= '" . $option->Name . "'";
        $db = new DataAccess();
        $result = $db->Execute($SQL);
    }

    public static function GetOnOption($Id) {
        $SQL = "SELECT * FROM Options WHERE OptionId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new Option();
            $t->OptionId = $row['OptionId'];
            $t->SalShoroo = $row['SalShoroo'];
            $t->SalPayan = $row['SalPayan'];
            $t->NimSal = $row['NimSal'];
            $t->Tozihat = $row['Tozihat'];
            return $t;
        }
    }

    public static function AssignStudents(Option $option, $students) {
        echo $option->OptionId . "<br/>";
        foreach ($students as $student) {
            echo $class . "<br/>";
            $SQL = "INSERT INTO StudentsOptions (Student,Option) VALUES (" . $option->OptionId . "," . $student . ")";
            $db = new DataAccess();
            $db->Execute($SQL);
        }
    }

//put your code here
}
