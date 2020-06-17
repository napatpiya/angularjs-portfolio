<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'config.php';
global $details;

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$fname = $request->fname;
$lname = $request->lname;
$address = $request->address;
$phone = $request->phone;

// Create connection
$conn = new mysqli($details['server_host'], $details['mysql_name'], $details['mysql_password'], $details['mysql_database']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE users SET fname='$fname', lname='$lname', address='$address', phone='$phone' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>