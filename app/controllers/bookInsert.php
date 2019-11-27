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
        unset($_POST['btnAddBook']);

        $book_id = create('books', $_POST);
        $_SESSION['message'] = 'Book added successfully';
        $_SESSION['type'] = 'success';
        header('../books.php');
        exit();
        //$book_id = create('books', $_POST);
        //$book = selectOne('books', ['bookId' => $book_id]);


        dd($_POST);
        
    }
 