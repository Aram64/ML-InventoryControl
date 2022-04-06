<?php
    session_start();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $Cemail = $_POST['Cemail'];
    $pwd = $_POST['password'];
    $Cpwd = $_POST['Cpassword'];

    
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
    //checks if username exists
    $sql = "SELECT * from accounts where username = '$username'";
    $result = $conn->query($sql);
    $usernamech = $result->fetch_array()[0] ?? '';
    //check if username exists
    $sql = "SELECT * from accounts where email = '$email'";
    $result = $conn->query($sql);
    $emailch = $result->fetch_array()[0] ?? '';
    if("" != $usernamech){
        header("location:index.html");
    }else if($emailch != ""){
        header("location:index.html");
    }else{
        /////////creates salt string
        function rand_string( $length ) {
        $salt="";
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";  
        $size = strlen( $chars );  
        //echo "Random string ="; 
        
        for( $i = 0; $i < $length; $i++ ) 
        {  
        $str= $chars[ rand( 0, $size - 1 ) ];  
        $salt .= $str;
        }  
        return $salt; 
        }
        $salt1 = rand_string(125);
        ///adds salt to pwd
        $pwd2 = $salt1 . $pwd;
        ///// hashes pwd
        $accKey = hash('sha256', $pwd2);
        
        $sql = "insert into accounts values('$username', '$accKey', '$email', '$salt1')";
        $conn->query($sql);
        $_SESSION['clientName'] = $username;
        header("location:Website Client 0_4/tabledata.php");
    }

    mysqli_close($conn);
    
?>