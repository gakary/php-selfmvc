<?php $heading = 'My Notes';

$config = require('config.php');

//create an instance Database
$db = new Database($config['database']);


$notes = $db->query('select * from notes where user_id = 1')->get();



require 'views/notes.view.php';