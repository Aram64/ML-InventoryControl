<?php
    session_start();
    $clientName = $_SESSION['clientName'];
    //Creating Servername variable
    $dbservername = "";
    $dbusername = "";
    $dbpassword = "";
    $dbname = "";

    //create connection
    $conn = new mysqli( $dbservername, $dbusername, $dbpassword, $dbname);
//checks if username exists
    $sql2 = "SELECT * FROM inventoryManagement.Receipts where username = '$clientName'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        // output data of each row
        $x2 = 0;
        $table2 = "";
        $s2 = 0;
        $totRow2 = $s2 + 3;
        $totCol2 = $x2 + 2;
        while($row2 = $result2->fetch_assoc()) {
            $table2= $table2.$row2["ReceiptID"]." ".$row2["username"]." ".$row2["itemName"]." ".$row2["Quantity"];
            //printf($table2);
            $s2++;
        } 
    } else {
        $table2 = "None found ";
    }

    $_SESSION['tableData2'] = $table2;
    mysqli_close($conn);
    header("location: ClientGUI.php");
    
?>