<?php

    require('connect.php');

    /*$sql = "SELECT * FROM books";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $books = $stm->get_result()->fetch_all(MYSQLI_ASSOC);*/

    //var_dump($books);       
    
    function dd($value){
        echo "<pre>", print_r($value, true), "</pre>";
        die();
    }

    function selectAll($table, $conditions = []){
        global $conn;
        $sql = "SELECT * FROM $table";
        if(empty($conditions)){
            $stm = $conn->prepare($sql);
            $stm->execute();
            $records = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }else{

        }
        
    }


    $books = selectAll('books');
    dd($books);
    
    
