<?php

function aboard($code){
    http_response_code(404);
    require_once ERRORS_PAGES . "/{$code}.tpl.php";
    die;
}