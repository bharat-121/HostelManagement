<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$db="hostel";

// Create connection
$mysqli =new mysqli($host,$dbuser, $dbpass, $db);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>