<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$id = $request->id;

$servername = "cookmenudb.ca6saodjmxzy.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "zaq12wsx"; //Your User Password
$dbname = "cookmenu_db"; //Your Database Name


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM menus WHERE id='$id' ";

if ($conn->query($sql) === TRUE) {
    echo "Delete successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>