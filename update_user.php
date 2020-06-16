<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$fname = $request->fname;
$lname = $request->lname;
$address = $request->address;
$phone = $request->phone;

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

$sql = "UPDATE users SET fname='$fname', lname='$lname', address='$address', phone='$phone' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>