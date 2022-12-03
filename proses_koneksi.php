<?php 
    session_start();
    $host = "localhost";
    $username = "id19952567_irvan";
    $password = "[h]$5PH}Dx@58Dm4";
    $database = "id19952567_komik_online";
    $conn = mysqli_connect($host, $username, $password, $database);


    if (!$conn) {
        die("Gagal terhubung ke database" . mysqli_connect_error());
    }
?>