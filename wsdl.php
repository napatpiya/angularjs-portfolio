<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'config.php';//make the cofig file include
global $details;//make the connection vars global
 
if($_GET['method'] == "load_user")
{
	$conn = new mysqli($details['server_host'],$details['mysql_name'],$details['mysql_password'],$details['mysql_database']);	
	$result = $conn->query("SELECT id, fname, lname, address, phone FROM users");
	$data=array();
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		$row=array();
		$row['id']=addslashes($rs["id"]);
	    $row['fname']=addslashes($rs["fname"]);
		$row['lname']=addslashes($rs["lname"]);
		$row['address']=addslashes($rs["address"]);
		$row['phone']=addslashes($rs["phone"]);
	   
	    $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
 
	$conn->close();
	echo json_encode($jsonData);
}

if($_GET['method'] == "load_user1")
{
	$conn = new mysqli($details['server_host'],$details['mysql_name'],$details['mysql_password'],$details['mysql_database']);	
	$result = $conn->query("SELECT id, fname, lname, address, phone FROM users");
	$rs = $result->fetch_assoc();
	// $data=array();
	// while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	// 	$row=array();
	// 	$row['id']=addslashes($rs["id"]);
	//     $row['fname']=addslashes($rs["fname"]);
	// 	$row['lname']=addslashes($rs["lname"]);
	// 	$row['address']=addslashes($rs["address"]);
	// 	$row['phone']=addslashes($rs["phone"]);
	   
	//     $data[]=$row;
	// }
	// $jsonData=array();
	// $jsonData['records']=$data;
 
	$conn->close();
	echo json_encode($rs);
}

if($_GET['method'] == "load_menu")
{
	$conn = new mysqli($details['server_host'],$details['mysql_name'],$details['mysql_password'],$details['mysql_database']);	
	$result = $conn->query("SELECT id, name, type, cuisine, price, description FROM menus ORDER BY updated_at DESC");
	$data=array();
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		$row=array();
		$row['id']=addslashes($rs["id"]);
		$row['name']=addslashes($rs["name"]);
		$row['type']=addslashes($rs["type"]);
		$row['cuisine']=addslashes($rs["cuisine"]);
		$row['price']=addslashes($rs["price"]);
        $row['description']=addslashes($rs["description"]);
	   
	    $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
 
	$conn->close();
	echo json_encode($jsonData);
}
?>