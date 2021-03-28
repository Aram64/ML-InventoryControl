<?php
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    //CHECK FOR ACTIVE SESSION
    //session_destroy();
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    } 

    
    //Creating Servername variable
    $dbservername = "acmdatabase-1.chkb77we6hez.us-east-2.rds.amazonaws.com";
    $dbusername = "Aram64";
    $dbpassword = "Diplo135";
    $dbname = "inventoryManagement";

    //create connection
    $conn = new mysqli( $dbservername, $dbusername, $dbpassword, $dbname);
    //check connectin
    if($conn -> connect_error){
        die("Connection failed:".$conn->connect_error);
    }

    //if($email = ''){
        //grabs username from database
    //    $username = 
    //}

    $sql = "SELECT username from accounts where email = '$email' and accountKey = '$pwd'";
    $result = $conn->query($sql);
    $clientName = $result->fetch_array()[0] ?? '';
    if($clientName != ""){
        $_SESSION['clientName'] = $clientName;
    }
    mysqli_close($conn);

    //checks if valid login
    if("admin@admin.com" == $email && isset($_SESSION['clientName'])){
        header("location: Website Admin_0_2/AdminGUI.php");
    }else if(isset($_SESSION['clientName'])){
        header("location: Website Client 0_4/ClientGUI.php");
        exit();
    }else{
        header("location:index.html");
    }


    //session_status()
    //$_SESSION['pname']


    //session_destroy()
?>