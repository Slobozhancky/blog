<?php

function aboard($code){
    http_response_code($code);
    require_once ERRORS_PAGES . "/{$code}.tpl.php";
    die;
}

function validateInputsWithForm(array $fillable){
    $data = [];

    foreach ($_POST as $key => $value) {
        if (in_array($key, $fillable)) {
            $data[$key] = htmlspecialchars(trim($value), ENT_QUOTES|ENT_SUBSTITUTE);
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

function old($fieldname){
    return isset($_POST[$fieldname]) ? $_POST[$fieldname] : '';
}

function specialChars($str){
    return htmlspecialchars($str, ENT_QUOTES|ENT_SUBSTITUTE);
}

function redirect($url = ''){
    if ($url) {
        $redirect = $url;
    }else{
        $redirect = isset($_SERVER['HHTP_REFERER']) ? $_SERVER['HHTP_REFERER'] : PATH;
    }

    header("Location: {$redirect}");
    die;
}