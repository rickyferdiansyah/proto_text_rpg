<?php
    $host       = "localhost";
    $user       = "root";
    $pass       = "Password7*";
    $db_name    = "repeg_db";

    $conn = mysqli_connect($host, $user, $pass, $db_name);
    if($conn){
        echo "connected";
    }else{
        echo "disconnected";
    }
?>