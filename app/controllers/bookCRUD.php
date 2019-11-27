<?php

    //include("../path.php");

    /*include(ROOT_PATH . "../app/database/db.php");
    if(isset($_POST['btnAddBook'])){
        unset($_POST['btnAddBook']);

        $book_id = create('books', $_POST);
        $book = selectOne('books', $book_id);
        
        dd($_POST);
        //die();
    }*/

    include(ROOT_PATH . "/app/database/db.php");
    if(isset($_POST['btnAddBook'])){
        dd($_POST);
        
    }
 