<?php

session_start();
// header('location:./admin_events.php');

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


if (isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];

    // Delete the event from the database
    $delete_sql = "DELETE FROM events WHERE imgname = '$event_id'";
    if (mysqli_query($db, $delete_sql)) {
        header('location: ../admin_events.php');
    } else {
        echo "Error deleting event: " . mysqli_error($db);
    }
} else {
    echo "Event ID not provided.";
}

// Close the database connection
mysqli_close($db);
?>
