<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



$routes =[
    '/'=>'controllers/index.php',
    '/about'=>'controllers/about.php',
    //listen for when the user request this url
    '/notes'=>'controllers/notes.php',
    //tracking the post id then link to the page
    '/note'=>'controllers/note.php',
    '/contact'=>'controllers/contact.php',
];

function abort($code = 404){
    http_response_code(404);

    require "views/{$code}.php";

    die();
}

function routeToController($uri,$routes){
    if(array_key_exists($uri,$routes)){
        require $routes[$uri];
    }else{
        abort();
    }
}
routeToController($uri,$routes);