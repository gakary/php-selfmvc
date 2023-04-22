<?php

$heading = 'Create Note';

//connect DB
$config = require('config.php');
//create an instance Database
$db = new Database($config['database']);


if($_SERVER['REQUEST_METHOD']==='POST'){
    //using prepared statement
    $db->query('INSERT INTO notes(body,user_id) VALUES(:body , :user_id)',[
        'body'=>$_POST['body'],
        //currently hard code to 1
        'user_id'=> 1
    ]);
}

require 'views/note-create.view.php';