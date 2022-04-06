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

    $sql = "SELECT * FROM inventoryManagement.inventoryItems";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $x = 0;
        $table = "";
        $s = 0;
        $totRow = $s + 3;
        $totCol = $x + 2;
        while($row = $result->fetch_assoc()) {
        //echo "Name of Item: " . $row["itemName"]. " - Item Count: " . $row["itemCount"]. " - expected items:" . $row["expectedItems"]. "<br>";
            //echo "The number is: $s <br>";
            $table= $table.$row["itemName"]." ".$row["itemCount"]." ".$row["expectedItems"]." ";
            //$_SESSION[$s][$x]=$row["itemName"];
            //$_SESSION[$s][$x+1]=$row["itemCount"] ;
            //$_SESSION[$s][$x+2]=$row["expectedItems"] ;
            
            //$ArrayStored[$s] = [$_SESSION[$s][$x],$_SESSION[$s][$x+1], $_SESSION[$s][$x+2]]; 
            //echo "Name of Item: " . $_SESSION[$s][$x]. " - Item Count: " . $_SESSION[$s][$x+1]. " - expected items:" .$_SESSION[$s][$x+2] . "<br>"; 
            $s++;
        } 
    } else {
        $table = "Non found";
    }


    mysqli_close($conn);
    //echo "<script type='text/javascript'>alert('$clientName');</script>"
    $_SESSION['tableData'] = $table;
    header("location: ClientGUI.php");
    
?>