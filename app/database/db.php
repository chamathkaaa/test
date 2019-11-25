<?php

    require('connect.php');

    /*$sql = "SELECT * FROM books";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $books = $stm->get_result()->fetch_all(MYSQLI_ASSOC);*/

    //var_dump($books);        

    function selectAll($table){
        global $conn;
        $sql = "SELECT * FROM $table";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $records = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

    $books = selectAll('books');
    echo "<pre>", print_r($books), "</pre>";
    
