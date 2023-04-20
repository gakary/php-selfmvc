<?php

//require'router.php';

//connect DB and prepare execute
class Database
{
    //property
    public $connection;

    //in real world should be using protect or other

    //1.make this variable can access in everywhere of this class
    public $statement;

    function __construct($config,$username='root',$password='')
    {

        //connect DB

        //refactor
        $dsn = 'mysql:' . http_build_query($config,'',';');

        //initialize a new POD instance , and we assign it to this connection instance property
        $this->connection = new PDO($dsn, $username ,$password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query,$params=[])//add $params = [] for blind
    {

//prepare SQL query to send to SQL

        //2. assign the connection -> prepare to statement variable
        $this->statement = $this->connection->prepare($query);

//send(execute) the query , add $params for blind

        //3. passing statement to execute the SQL
        $this->statement->execute($params);

        //4. return back to the call place , such as note.php , then assign to find()method , because note.php called
        return $this;
    }

 public function get(){
        return $this->statement->fetchAll();
 }


public function find(){
        //5. passing statement variable to fetch method then return the result to which place called , note.php
    return $this->statement->fetch();
}

public function findOrFail(){
        //call the fetch method , then assign back to result variable
        $result = $this->find();

        //if result is false , call abort method
        if(!$result ){
            abort();
        }
        //if result is true , return the result back to note.php
        return $result;
    }
}