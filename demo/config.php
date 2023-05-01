<?php

/*
 * This configuration file is not exclusive to  your database credentials

you can use entire application.*/

return [
    'database'=>[
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'myapp',
        'charset' => 'utf8mb4'
    ]
];



/*
 Think about it , If in the future you have specific configuration that is not connected to the database , you have a place to put it

for example , as you mature you often work with external services (API)

companies will give you tokens or secret keys that you need to reference in your code .


 There would be good place to declare it ,
 because remember those tokens and secrets again will often be unique
dependent upon whether you’re in a local setting or a production setting

 */