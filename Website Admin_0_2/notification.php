<?php
	session_start();
	//Creating Servername variable
	$dbservername = "acmdatabase-1.chkb77we6hez.us-east-2.rds.amazonaws.com";
	$dbusername = "Aram64";
	$dbpassword = "Diplo135";
	$dbname = "inventoryManagement";

	//create connection
	$conn = new mysqli( $dbservername, $dbusername, $dbpassword, $dbname);
	//check connection
	if($conn -> connect_error){
	die("Connection failed:".$conn->connect_error);
	}
	
	$sql = "SELECT itemName from inventoryItems where expectedItems != itemCount;";
	$result = $conn->query($sql);
    //$items = $result->fetch_array()[0] ?? '';
    
	if (mysqli_num_rows ($result) != 0) {
    $notification = "There are Unexpected/Missing items in the inventory!";
    $notificationimg = "1";
	} else {
	$notification = "No new notifications.";
	$notificationimg = "0";
	}
	mysqli_close($conn);

	$_SESSION['notif'] = $notification;
	$_SESSION['notifimg'] = $notificationimg;

	header("location: AdminGUI.php");

?>