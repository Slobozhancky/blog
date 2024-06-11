<?php

function aboard($code){
    http_response_code($code);
    require_once ERRORS_PAGES . "/{$code}.tpl.php";
    die;
}