<?php
include '../config.php';

    $jumlahexp = 10;
    $query = "UPDATE player_tb SET exp = 0 WHERE id=1";
    $sql = mysqli_query($conn, $query);

    

    if($sql){
        header('Location: ../index.php');
    }
