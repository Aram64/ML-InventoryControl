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
	
	$sql = "SELECT username, email FROM accounts where username != 'Admin'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
        // output data of each row
        $x = 0;
        $table = "";
        $s = 0;
        $totRow = $s + 3;
        $totCol = $x + 2;
        while($row = $result->fetch_assoc()) {
            $table= $table.$row["username"]." ".$row["email"]." ";
            $s++;
        } 
	} else {
	$table = "Non found";
	}
	mysqli_close($conn);

	$_SESSION['userData'] = $table;

	header("location: notification.php");

?>