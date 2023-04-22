<?php

$heading = 'Create Note';

//require the Validator.php
require 'Validator.php';

//connect DB
$config = require('config.php');
//create an instance Database
$db = new Database($config['database']);




if($_SERVER['REQUEST_METHOD']==='POST'){
    $errors = [];


    if(!Validator::string()->string($_POST['body'],1,1000)){
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
    }


    //is that the $error is empty , if empty : true -> execute tis
    if(empty($errors)){
        //using prepared statement
        $db->query('INSERT INTO notes(body,user_id) VALUES(:body , :user_id)',[
            'body'=>$_POST['body'],
            //currently hard code to 1
            'user_id'=> 1
        ]);
    }
}

require 'views/note-create.view.php';