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


$sql = "DELETE FROM contact";
    
// Execute query
mysqli_query($db, $sql);

$location =  $_POST['location'];
$phone =  $_POST['phone'];
$email =  $_POST['email'];


$sql = "INSERT INTO contact VALUES('$location','$phone','$email')" ;
    
// Execute query
mysqli_query($db, $sql);



header('location: ../admin_home.php');


?>
