<?php
	session_start();
	$table = $_SESSION['userData'];
	
	$tablelen = strlen ($table);
	
	
	$userStorage =array();

	$table = $table.substr(0, $tablelen-1);
    $count = substr_count($table, ' ');
    
    $table = explode(" ", $table);
   
    $temp = 0;
    for ($i = 0; $i<$count/2;$i++ ){
      $userStorage[$i] = array();
      for ($j = 0; $j<2;$j++ ){
          $temp = $i*2;
          $userStorage[$i][$j] = $table[$j+$temp];
      }
    }

	//echo print_r($userStorage);  
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
	
	//$status = explode(' ', mysql_stat($conn));
	//print_r($status);
	
	$cur = 1;
	for ($x = 0; $x < $count/2; $x++ ){
	    if(isset($_POST['name'.$cur])){
	        $rmuser = $userStorage[$x][0];
	        if (!$conn -> query("SET FOREIGN_KEY_CHECKS=0;")) {
              echo("Error description: " . $conn -> error);
            }
	        if (!$conn -> query("delete FROM accounts where username = '$rmuser'")) {
              echo("Error description: " . $conn -> error);
            }
	        //$sql = "delete FROM accounts where username = '$rmuser'";
            //$result = $conn->query($sql);
	        //echo $userStorage[$x][0];
	        //echo $rmuser;
	    }
	    $cur = $cur + 3;
    	
	}
    
    

	mysqli_close($conn);

	//$_SESSION['userData'] = $table;

	header("location: tabledata.php");

?>