<?php
    session_start();
    $username = $_POST['username']
    $email = $_POST['email'];
    $Cemail = $_POST['Cemail'];
    $pwd = $_POST['password'];
    $Cpwd = $_POST['Cpassword'];

    if($email != $Cemail){
        echo '<script>alert("Email is not the same!")</script>'; 
    }else if($pwd != $Cpwd){
        echo '<script>alert("Passwords are not the same!")</script>';
    }else{
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
        
        $sql = "SELECT username from accounts where email = '$email'";
        $result = $conn->query($sql);
        $username = $result->fetch_array()[0] ?? '';
        if(username != ""){
            echo '<script>alert("Username taken!")</script>';
        }

        mysqli_close($conn);
        /*
        //checks if valid login
        if(('admin@admin.com' == $email) && (isset($_SESSION['clientName']))){
            header("location: Website Admin_0_2/AdminGUI.php");
        }else if(isset($_SESSION['clientName']){
            header("location: Website Client 0_4/ClientGUI.php");
            exit();
        }else{
            header("location:index.html");
        }

        
        $sql = "SELECT username from accounts where email = '$email' and accountKey = '$pwd'";
        $result = $conn->query($sql);
        $clientName = $result->fetch_array()[0] ?? '';
        if($clientName != ""){
            $_SESSION['clientName'] = $clientName;
        } */

    }

    
?>