<?php
    //CHECK FOR ACTIVE SESSION
    //session_destroy();
    session_start();
    $clientNameGet = $_SESSION['clientName'];
    
    //Grabs the variables place holder with table
    $Controller = $_GET['a4'];
    $Pins =  $_GET['a8'];
    $RPi =  $_GET['a12'];
    
    $ControllerN = "Controller";
    $PinsN =  "Pins";
    $RPiN =  "RaspberryPi";
    
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

    
    $sql = "SELECT expectedItems from inventoryItems where itemName = '$ControllerN'";
    $sql2 = "SELECT expectedItems from inventoryItems where itemName = '$PinsN'";
    $sql3 = "SELECT expectedItems from inventoryItems where itemName = '$RPiN'";
    
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    
    if ($result->num_rows > 0) {
    // output data of each row
    $table = "";
    while($row = $result->fetch_assoc()) {
        $table= $row["expectedItems"];
        $tableNum = $table + 0;
        } 
    } else {
        $table = "None found";
    }
    if ($result2->num_rows > 0) {
    // output data of each row
    $table2 = "";
    while($row2 = $result2->fetch_assoc()) {
        $table2= $row2["expectedItems"];
        $tableNum2 = $table2 + 0;
        } 
    } else {
        $table2 = "Nonee found";
    }
    if ($result3->num_rows > 0) {
    // output data of each row
    $table3 = "";
    while($row3 = $result3->fetch_assoc()) {
        $table3=$row3["expectedItems"];
        $tableNum3 = $table3 + 0;
        
    } 
    } else {
        $table3 = "Noneee found";
    }
    //minus-ing the numbers
    $Controller += 0;
    $Pins +=  0;
    $RPi +=  0;
    
    $sum1 = 0;
    $sum2 = 0;
    $sum3 = 0;
    
    $sum1 = $tableNum - $Controller;
    $sum2 = $tableNum2 - $Pins;
    $sum3 = $tableNum3 - $RPi;


$NotifyController = "";
$NotifyPins = "";
$NotifyRPi = "";

$NotifyUnableContr = "";
$NotifyUnablePins = "";
$NotifyUnableRPi = "";

if( $sum1>-1)
    { // code to be executed if n = 1;
     //echo "Thank you for your purchase of Controller";
     $sql = "insert into Receipts (ReceiptID, username, itemName, Quantity,DateItem) Values (CONCAT(CURRENT_TIMESTAMP(),'$clientNameGet','$ControllerN'),'$clientNameGet','$ControllerN',$Controller,CURRENT_TIMESTAMP())";
     $result = $conn->query($sql);
     $NotifyController = $Controller.' '.$ControllerN;
     $sql = "UPDATE inventoryItems set inventoryItems.expectedItems = $sum1 where itemName = '$ControllerN'";
     $result = $conn->query($sql);
    }
    
else{ // code to be executed if n = 2;
        $NotifyUnableContr = "Cannot purchase this amount of Controllers";
}

if( $sum2>=0){ // code to be executed if n = 1;
     //echo "Thank you for your purchase of Pins";
     $sql2 = "insert into Receipts (ReceiptID, username, itemName, Quantity,DateItem) Values (CONCAT(CURRENT_TIMESTAMP(),'$clientNameGet','$PinsN'),'$clientNameGet','$PinsN',$Pins, CURRENT_TIMESTAMP())";
     $NotifyPins = $Pins.' '.$PinsN;
     $result2 = $conn->query($sql2);
     
     $sql2 = "UPDATE inventoryItems set inventoryItems.expectedItems = $sum2 where itemName = '$PinsN' ";
     $result2 = $conn->query($sql2);
    
}
else{ // code to be executed if n = 2;
        $NotifyUnablePins = "Cannot purchase this amount of Pins";
    
}

if( $sum3>=0){ // code to be executed if n = 1;
     //echo "Thank you for your purchase of RPis";
     $sql3 = "insert into Receipts (ReceiptID, username, itemName, Quantity,DateItem) Values (CONCAT(CURRENT_TIMESTAMP(),'$clientNameGet','$RPiN'),'$clientNameGet','$RPiN',$RPi,CURRENT_TIMESTAMP())";
     $result3 = $conn->query($sql3);
     
     $NotifyRPi = $RPi.' '.$RPiN;
     
     $sql3 = "UPDATE inventoryItems set inventoryItems.expectedItems = $sum3 where itemName = '$RPiN'";
     $result3 = $conn->query($sql3);
    
}
else{ // code to be executed if n = 2;
        $NotifyUnableRPi = "Cannot purchase this amount of RPi's";
}

//echo "Thank you for your purchase of".$NotifyController." ". $NotifyPins." ".$NotifyRPi;
//echo "Was not able to process".$NotifyUnableContr." ".$NotifyUnablePins." ".$NotifyUnableRPi;

$DidNotProcess = "";
$ThankNotify =  "";
$_SESSION['Notification'] = "";
$_SESSION['NotificationNotProcessed'] = "";

if ($sum1<0 && $sum2<0 && $sum3<0){
    $_SESSION['Notification'] = "your purchase of ".$NotifyUnableContr ." \n". $NotifyUnablePins." \n". $NotifyUnableRpi. "\n were unable to be processed";
    $_SESSION['NotificationNotProcessed'] = "";
    
}

elseif ($sum1>= 0 && $sum2>= 0 && $sum3 >= 0){
    $_SESSION['Notification'] =  "your purchase of ". $NotifyController. " \n". $NotifyPins. " \n".$NotifyRPi;
    $_SESSION['NotificationNotProcessed'] = "";
}

elseif ($sum1 >= 0 || $sum2>= 0 || $sum3 >= 0 ){
    $_SESSION['Notification'] =  $NotifyController. "  \n". $NotifyPins. "  \n".$NotifyRPi;
    $_SESSION['NotificationNotProcessed'] = "\n".$NotifyUnableContr ."  \n". $NotifyUnablePins."  \n". $NotifyUnableRPi;
}
else
{
 echo "idk what happened it shouldnt go here";       
}

 mysqli_close($conn);
 header("location: tabledata.php");
?>