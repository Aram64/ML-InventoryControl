<?php
	session_start();
	//Creating Servername variable
	$dbservername = "";
	$dbusername = "";
	$dbpassword = "";
	$dbname = "";

	//create connection
	$conn = new mysqli( $dbservername, $dbusername, $dbpassword, $dbname);
	//check connectin
	if($conn -> connect_error){
	die("Connection failed:".$conn->connect_error);
	}
	
	$sql = "UPDATE inventoryItems set inventoryItems.expectedItems = inventoryItems.itemCount  where itemName = itemName";
	$result = $conn->query($sql);

	mysqli_close($conn);

	header("location: tabledata.php");

?>