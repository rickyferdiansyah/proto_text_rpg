<?php
include '../config.php';

    $jumlahexp = 100;
    $query = "UPDATE player_tb SET exp = exp+$jumlahexp WHERE id=1";
    $sql = mysqli_query($conn, $query);

    
    if($sql){
        header('Location: ../index.php');
    }




?>