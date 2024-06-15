<?php

function aboard($code){
    http_response_code($code);
    require_once ERRORS_PAGES . "/{$code}.tpl.php";
    die;
}

function vlidateInputsWithForm(array $fillable){
    $data = [];

    foreach ($_POST as $key => $value) {
        if (in_array($key, $fillable)) {
            $data[$key] = $value;
        }
    }

    return $data;
}

function validateOnEmpty(array $items){
    $errors = [];

    foreach ($items as $key => $value) {
        if (empty(trim($value))) {
            $errors[$key] = "{$key} is empty. Pls enter the value";
        }
    }

    return $errors;
}