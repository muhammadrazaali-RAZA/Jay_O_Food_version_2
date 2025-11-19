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

$id        = $_POST['id'];
$name      = $_POST['Name'];
$volcost   = $_POST['VolCost'];
$type      =  $_POST['type'];
$class     =  $_POST['class'];

$sql = "UPDATE drinks SET Name = '$name', type = '$type', volcost = '$volcost', class = '$class' WHERE id = '$id'";


// Execute query
mysqli_query($db, $sql);



 header('location: ../admin_drink.php');


?>
