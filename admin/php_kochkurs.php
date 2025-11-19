<?php

session_start();
header('location:../admin_kochkurs.php');

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

$eventDate = $_POST['eventDate'];
$cost = $_POST['cost'];
$days = $_POST['days'];
$duration = $_POST['duration'];
$benefits = $_POST['benefits'];
$detail = $_POST['detail'];

// Get all the submitted data from the form
$sql = "INSERT INTO masterCourses (event,cost,couseDay,timing,benefits,info) VALUES ('$eventDate','$cost','$days','$duration','$benefits','$detail')";

echo $sql;

// Execute query
mysqli_query($db, $sql);


?>

