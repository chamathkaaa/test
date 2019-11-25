<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'inside';

    $conn = new MySQLi($host, $user, $pass, $db_name);


    if($conn->connect_error){
        die('database Connectino Error '. $conn->connect_error);
    }else{
        echo "DB is connected successfully";
    }

