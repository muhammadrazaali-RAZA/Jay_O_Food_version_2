<?php

session_start();

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


$email = $_POST['email'];
$pass = $_POST['pass'];

// echo $_POST['pass'];

$s = " select * from admin where email = '$email' && pass = '$pass'";

// echo $s;
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

$row = mysqli_fetch_array($result);

$name= $row["name"];
echo $name;



// Set session variables
$_SESSION["name"] = $name;
$_SESSION["pass"] = $pass;
$_SESSION['start'] = time();

// echo $num;
if($num == 1 ){
	header('location:../admin_home.php');
}else{
	header("location:index.php?first_name={$email}&unique={$pass}");
}

?>
