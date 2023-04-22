<?php



$routes = require('routers.php');

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
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri,$routes);