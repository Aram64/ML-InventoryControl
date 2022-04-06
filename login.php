<?php
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    //CHECK FOR ACTIVE SESSION
    //session_destroy();
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    } 

    
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

    /////////////////////////
    // creates account key
    $sql = "SELECT passwordSalt from accounts where email = '$email'";
    $result = $conn->query($sql);
    $salt = $result->fetch_array()[0] ?? '';
    if($salt != ""){
        $pwd2 = $salt . $pwd;
        ///// hashes pwd
        $accKey = hash('sha256', $pwd2);
     
        ///////////////////////////////
        $sql = "SELECT username from accounts where email = '$email' and accountKey = '$accKey'";
        $result = $conn->query($sql);
        $clientName = $result->fetch_array()[0] ?? '';
        if($clientName != ""){
            $_SESSION['clientName'] = $clientName;
        }
        mysqli_close($conn);
    }

    //checks if valid login
    if("admin@admin.com" == $email && isset($_SESSION['clientName'])){
        header("location: Website Admin_0_2/tabledata.php");
    }else if(isset($_SESSION['clientName'])){
        header("location: Website Client 0_4/tabledata.php");
        exit();
    }else{
        header("location:index.html");
    }

?>