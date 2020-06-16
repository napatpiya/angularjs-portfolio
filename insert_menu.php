<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$name = $request->name;
$type = $request->type;
$cuisine = $request->cuisine;
$price = $request->price;
$description = $request->description;

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

$sql = "INSERT INTO menus (name, type, cuisine, price, description) VALUES ('$name', '$type', '$cuisine', '$price', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>