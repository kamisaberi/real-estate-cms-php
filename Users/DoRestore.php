<?php
require_once '../fileman/system.inc.php';
require_once '../fileman/php/functions.inc.php';

$filename = $_POST['file'];
//echo $filename;
$filename = str_replace("\\", "/", $filename);
$filename = str_replace("//", "/", $filename);
$parse = parse_ini_file("../Config/Connection.ini", FALSE);
$Host = $parse['host'];
$User = $parse['user'];
$Password = $parse['password'];
$Database = $parse['database'];

$mysql_host = $Host;
// MySQL username
$mysql_username = $User;
// MySQL password
$mysql_password = $Password;
// Database name
$mysql_database = $Database;

//echo $filename;
//////////////////////////////////////////////////////////////////////////////////////////////
// Connect to MySQL server
//die();

try {
    $con = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
//mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
// Temporary variable, used to store current query
    $templine = '';
// Read in entire file
    $lines = file($_SERVER['DOCUMENT_ROOT'] . $filename);
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $filename)) {
        throw new Exception();
    }
// Loop through each line
    foreach ($lines as $line) {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;

        // Add this line to the current segment
        $templine .= $line;
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';') {
            // Perform the query
            mysqli_query($con, "set character_set_client='utf8'");
            mysqli_query($con, "set character_set_results='utf8'");
            mysqli_query($con, "set collation_connection='utf8_general_ci'");

            mysqli_query($con, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
            // Reset temp variable to empty
            $templine = '';
        }
    }


    header("Location: RestoreDone.php");
} catch (Exception $e) {
    header("Location: RestoreError.php");
}
?>