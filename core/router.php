<?php

require CONFIG . '/routers.php';

$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

if (array_key_exists($uri, $routes)) {
    if(file_exists(CONTROLLERS . "/{$routes[$uri]}")){
        require CONTROLLERS . "/{$routes[$uri]}";
    } else {
        aboard(404);  
    };
}else {
    aboard(404);
}
