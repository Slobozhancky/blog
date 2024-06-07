<?php

require_once '../core/constants.php';
require_once '../core/func.php';
require_once '../vendor/autoload.php';

$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

d($_GET);

if ($uri === '') {
    require CONTROLLERS . '/index.php';
}elseif($uri === 'about'){
    require CONTROLLERS . '/about.php';
}else{
    aboard(404);
}
