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

    function executeQuery($sql, $data){
        global $conn;
        $stm = $conn->prepare($sql);
        $values = array_values($data);
        $types = str_repeat('s', count($values));
        $stm->bind_param($types, ...$values);
        $stm->execute();
        return $stm;
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
            $i = 0;
            foreach($conditions as $key => $value){
                if($i === 0){
                    $sql = $sql . " WHERE $key=?";
                }else{
                    $sql = $sql . " AND $key=?";
                }
                $i++;
            }

            $stm = executeQuery($sql, $conditions);
            $records = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;

        }
        
    }

    function selectOne($table, $conditions){
        global $conn;
        $sql = "SELECT * FROM $table";

        $i = 0;
        foreach($conditions as $key => $value){
            if($i === 0){
                $sql = $sql . " WHERE $key=?";
            }else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT 1";
        $stm = executeQuery($sql, $conditions);
        $records = $stm->get_result()->fetch_assoc();
        return $records;

    }

    function create($table, $data){
        global $conn;
        $sql = "INSERT INTO $table SET";

        $i = 0;
        foreach($data as $key => $value){
            if($i === 0){
                $sql = $sql . " $key=?";
            }else{
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $stm = executeQuery($sql,  $data);
        $id = $stm->insert_id;
        return id;

    }

    function update($table, $id, $data){
        global $conn;
        $sql = "UPDATE $table SET";

        $i = 0;
        foreach($data as $key => $value){
            if($i === 0){
                $sql = $sql . " $key=?";
            }else{
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $sql = $sql . " WHERE id=?";
        $data['bookId'] = $id;
        $stm = executeQuery($sql,  $data);        
        return $stm->affected_rows;

    }

    function delete($table, $id){
        global $conn;
        $sql = "DELETE FROM $table WHERE id=?";

        $stm = executeQuery($sql, ['id' => $id]);
        return $stm->affected_rows;
    }


    //$books = selectAll('books');
    // /dd($books);
    
    
