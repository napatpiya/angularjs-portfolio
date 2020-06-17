<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'config.php';
global $details;

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$id = $request->id;

// Create connection
$conn = new mysqli($details['server_host'], $details['mysql_name'], $details['mysql_password'], $details['mysql_database']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM menus WHERE id='$id' ";

if ($conn->query($sql) === TRUE) {
    echo "Deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>