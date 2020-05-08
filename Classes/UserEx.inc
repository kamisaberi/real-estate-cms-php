<?php

require_once 'User.inc';

//use DataAccess;
/**
 * Description of User
 *
 * @author kami
 */
class UserEx {

    public static function Insert(User $user) {
        $SQL = "INSERT INTO Users (Username,Passwd) VALUES ('" . $user->Username . "','" . md5($user->Passwd) . "')";
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    //$ts= new User();

    public static function Update(User $user) {
        $SQL = "UPDATE Users SET Username = '" . $user->Username . "',Passwd = '" . md5($user->Passwd) . "' WHERE UserId=" . $user->UserId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    public static function Delete(User $user) {
        $SQL = "DELETE FROM Users WHERE UserId=" . $user->UserId;
        $db = new DataAccess();
        $db->Execute($SQL);
    }

    function Test(User $user) {
        $s = array();
        $t = new User();
        $t->Name = "ali";
        $s[0] = $t;
        $t1 = new User();
        $t1->Name = "reza";
        $s[1] = $t1;
        return $s;
    }

    public static function Fill() {
        $SQL = "SELECT * FROM Users ";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        $users = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            //echo 'aasdas<br/>';
            $t = new User();
            $t->UserId = $row['UserId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            $users[$i] = $t;
            $i++;
        }
        return $users;
    }

    public static function GetOnUser($Id) {
        $SQL = "SELECT * FROM Users WHERE UserId= " . $Id;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);

        while ($row = mysqli_fetch_array($result)) {
            $t = new User();
            $t->UserId = $row['UserId'];
            $t->Name = $row['Name'];
            $t->Family = $row['Family'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            return $t;
        }
    }

        public static function GetOneUserBasedOnUsername($username) {
        $SQL = "SELECT * FROM Users WHERE Username= '" . $username . "'";
        //echo $SQL ."<br />";
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        while ($row = mysqli_fetch_array($result)) {
            $t = new User();
            $t->UserId = $row['UserId'];
            $t->Username = $row['Username'];
            $t->Passwd = $row['Passwd'];
            return $t;
        }
    }

    
    public static function Login($username, $password) {
        $SQL = "SELECT * FROM Users WHERE Username= '" . $username . "' AND Passwd='" . md5($password) . "'";
        echo $SQL;
        $db = new DataAccess();
        $result = $db->ExecuteSelect($SQL);
        if (mysqli_num_rows($result) > 0) {

            return TRUE;
        }
        return FALSE;
    }



//put your code here
}
