<?php

session_start();
header('location:admin_events.php');

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

// $img = $_FILES['img'];
$filename = $_FILES['img']["name"];
$tempname = $_FILES['img']["tmp_name"];
$folder = "img/events/" .$_POST['Name']. $filename;

$name = $_POST['Name'];
$event_start = $_POST['event_start'];
$event_end = $_POST['event_end'];
$location = $_POST['location'];
$detail = $_POST['detail'];

// Get all the submitted data from the form
$sql = "INSERT INTO events VALUES ('$name$filename','$name','$event_start','$event_end','$location','$detail')";

// Execute query
mysqli_query($db, $sql);

 
// Now let's move the uploaded image into the folder: image
if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  Image uploaded successfully!</h3>";
} else {
    echo "<h3>  Failed to upload image!</h3>";
}

?>

