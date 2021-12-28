<?php

/**
 * 
 */
class Backup extends Model
{
	public function getbackup()
	{
		/*
		
		 $files =array();
         $basename = $filename = $unixTimestamp = null;

         foreach ($files as $file) {
             if ($file != "." && $file != "..") {

                 $filename_array = explode('-', pathinfo($file, PATHINFO_FILENAME));
                 if(count($filename_array) !== 2){
                     continue;
                 }

                 // backup file has name with something like this: backup-1435788336
                 list($filename, $unixTimestamp) = $filename_array;
                 $basename = $file;
                 break;
             }
         }

         $data = array("basename" => $basename, "filename" => $filename, "date" => "On " . date("F j, Y", $unixTimestamp));
         return $data;
	}
	*/

	$host = "localhost";
    $username = "root";
    $password = "";
    $database_name = "ReadEra_db";
	
	
    $conn = mysqli_connect($host, $username, $password, $database_name);
    $conn->set_charset("utf8");


// get all tables 
    $tables = array();
    $sql = "SHOW TABLES";
    $result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_row($result)) 
{
    $tables[] = $row[0];
}

$sqlScript = "";
$sqlScript .= "DROP DATABASE IF EXISTS test_db;\n
CREATE DATABASE test_db;\n
USE test_db;\n
SET FOREIGN_KEY_CHECKS = 0;";
foreach ($tables as $table) 
{
    
    //creating table
    $query = "SHOW CREATE TABLE $table";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    
    $sqlScript .= "\n\n" . $row[1] . ";\n\n";
    
    
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    
    $columnCount = mysqli_num_fields($result);
    
    // get data each table
    for ($i = 0; $i < $columnCount; $i ++)
     {
        while ($row = mysqli_fetch_row($result))
         {
            $sqlScript .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $columnCount; $j ++) 
            {
                $row[$j] = $row[$j];
                
                if (isset($row[$j]))
                 {
                    $sqlScript .= '"' . $row[$j] . '"';
                } else {
                    $sqlScript .= '""';
                }
                if ($j < ($columnCount - 1)) 
                {
                    $sqlScript .= ',';
                }
            }
            $sqlScript .= ");\n";
        }
    }
    
    $sqlScript .= "\n"; 


}
$sqlScript .= "SET FOREIGN_KEY_CHECKS = 1;"; 


if(!empty($sqlScript))
{
    // save sql script to backup code
    $backup_file_name = $database_name . '_backup_' . time() . '.sql';
    $fileHandler = fopen($backup_file_name, 'w+');
    $number_of_lines = fwrite($fileHandler, $sqlScript);
    fclose($fileHandler); 

    // Download backup code
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($backup_file_name));
    ob_clean();
    flush();
    readfile($backup_file_name);
    exec('rm ' . $backup_file_name); 
}

}

 
}
