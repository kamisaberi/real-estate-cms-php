<?php

$parse = parse_ini_file("../Config/Connection.ini", FALSE);
$Host = $parse['host'];
$User = $parse['user'];
$Password = $parse['password'];
$Database = $parse['database'];

//exec('C:\xampp\mysql\bin\mysqldump --user=kami --password=1234 --host=127.0.0.1 school > file.sql');
backup_tables($Host, $User, $Password, $Database);


/* backup the db OR just a table */

function backup_tables($host, $user, $pass, $name, $tables = '*') {

    //$link = mysql_connect($host,$user,$pass);
    $con = mysqli_connect($host, $user, $pass, $name);
    //mysql_select_db($name,$link);
    //get all of the tables
    if ($tables == '*') {
        $tables = array();
        $result = mysqli_query($con, 'SHOW TABLES');
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    //cycle through
    $return = "";
    foreach ($tables as $table) {
        //echo $table . "<br/>";
        mysqli_query($con, "set character_set_client='utf8'");
        mysqli_query($con, "set character_set_results='utf8'");
        mysqli_query($con, "set collation_connection='utf8_general_ci'");

        $result = mysqli_query($con, 'SELECT * FROM ' . $table);
        $num_fields = mysqli_num_fields($result);

        $return.= 'DROP TABLE IF EXISTS ' . $table . ';';
        $row2 = mysqli_fetch_row(mysqli_query($con, 'SHOW CREATE TABLE ' . $table));
        $return.= "\n\n" . $row2[1] . ";\n\n";

        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = mysqli_fetch_row($result)) {
                $return.= 'INSERT INTO ' . $table . ' VALUES(';
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("\n", "\\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return.= '"' . $row[$j] . '"';
                    } else {
                        $return.= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return.= ',';
                    }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }

    //save file
    date_default_timezone_set("Iran");
    
    $time=date('Y'). "-" . date('m') . "-". date('d') . "_" . date('H.i.s');
    $file= '../Backup/db-backup-' . $time ."_file" . '.sql';
    
    $handle = fopen($file, 'w+');
    fwrite($handle, $return);
    fclose($handle);
    
    
    
    //$zip=$_SERVER['DOCUMENT_ROOT'] .  '/../' . $time . ".zip";
    //$zip=  dirname(__FILE__) .  '/Backup/' . $time . ".zip";
    $zip=  '../Backup/' . $time . ".zip";
    echo $zip;
    
    $files_to_zip = array(
        $file
);
//if true, good; if false, zip creation failed
//$result = create_zip($files_to_zip,$zip);
}


/* creates a compressed zip file */
function create_zip($files = array(),$destination = '',$overwrite = false) {
	//if the zip file already exists and overwrite is false, return false
	if(file_exists($destination) && !$overwrite) { return false; }
	//vars
	$valid_files = array();
	//if files were passed in...
	if(is_array($files)) {
		//cycle through each file
		foreach($files as $file) {
			//make sure the file exists
			if(file_exists($file)) {
				$valid_files[] = $file;
			}
		}
	}
	//if we have good files...
	if(count($valid_files)) {
		//create the archive
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
		//add the files
		foreach($valid_files as $file) {
			$zip->addFile($file,$file);
		}
		//debug
		//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
		
		//close the zip -- done!
		$zip->close();
		
		//check to make sure the file exists
		return file_exists($destination);
	}
	else
	{
		return false;
	}
}

header("Location: BackupDone.php");