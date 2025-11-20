<?php

session_start();
header('location:contact_done.php');

// $con = mysqli_connect('mysqlsvr83.world4you.com', 'sql2907834', '5cf4r*eg', '5669563db1');
// $con = mysqli_connect('localhost', 'root', '', 'jayo');

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

$name = $_POST['Name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$txt = $_POST['txt'];

$timing = date('Y-m-d H:i:s'); // Get current datetime in the format 'YYYY-MM-DD HH:MM:SS'

$reg = "INSERT INTO contact_web VALUES ('$timing', '$name', '$email', '$subject', '$txt')";
mysqli_query($con, $reg);

?>
