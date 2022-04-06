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

    $sql = "SELECT itemName,itemCount, replace(DateItem, ' ','|')  FROM inventoryManagement.itemLogs order by DateItem ASC Limit 25;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $table = "";
        while($row = $result->fetch_assoc()) {
            $table= $table.$row["itemName"]." ".$row["itemCount"]." ".$row["replace(DateItem, ' ','|')"]." ";
        } 
    } else {
        $table = "Non found";
    }


    mysqli_close($conn);
    //echo "<script type='text/javascript'>alert('$clientName');</script>"
    $_SESSION['logData'] = $table;

    header("location: itemLogs/ItemsLogsGUI.php");
    
?>