<?php

session_start();


// $db = mysqli_connect('mysqlsvr83.world4you.com', 'sql2907834', '5cf4r*eg', '5669563db1');
// $db = mysqli_connect('localhost', 'root', '', 'jayo');

// Read database connection details from the text file
$databaseFile = 'database_connect.txt';
$lines = file($databaseFile, FILE_IGNORE_NEW_LINES);

if (!$lines || count($lines) !== 4) {
    die("Error reading database connection details.");
}

$host = $lines[0];
$username = $lines[1];
$password = $lines[2];
$database = $lines[3];

// Establish the database connection
$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$db = $con;


$sql = "DELETE FROM Res_timing";
    
// Execute query
mysqli_query($db, $sql);

$dienstag =  $_POST['dienstag'];
$mittwoch =  $_POST['mittwoch'];
$donnerstag =  $_POST['donnerstag'];
$freitag =  $_POST['freitag'];
$samstag =  $_POST['samstag'];
$feiertag =  $_POST['feiertag'];
$mon_sonn =  $_POST['mon_sonn'];


$sql = "INSERT INTO Res_timing VALUES('$dienstag','$mittwoch','$donnerstag','$freitag','$samstag','$feiertag','$mon_sonn')" ;
    
// Execute query
mysqli_query($db, $sql);



header('location: ../admin_home.php');


?>
