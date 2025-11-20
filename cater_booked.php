<?php

session_start();
header('location:CateringBooked.php');

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
$phone = $_POST['phone'];
$email = $_POST['email'];
$res_date = $_POST['rev_date'];
$people = $_POST['people'];
$menu = $_POST['menu'];
$request_ = $_POST['request'];
$timing = date('Y-m-d H:i:s'); // Get current datetime in the format 'YYYY-MM-DD HH:MM:SS'

$reg = " insert into cater_book values ('$timing','$name','$phone','$email','$res_date','$people','$menu','$request_')";
mysqli_query($con, $reg);
// echo $people;
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['menu'] = $menu;
$_SESSION['person'] = $people;
$_SESSION['date'] = $res_date;

?>
