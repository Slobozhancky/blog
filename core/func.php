<?php

function aboard($code, $title = '404'){
    http_response_code($code);
    require_once ERRORS_PAGES . "/{$code}.tpl.php";
    die;
}

function validateInputsWithForm(array $fillable){

    $api_data = json_decode(file_get_contents('php://input'), 1);

    $dat_for_create_post = $api_data ?? $_POST;

    $data = [];

    foreach ($dat_for_create_post as $key => $value) {
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
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }

    header("Location: {$redirect}");
    die;
}

function getAllerts(){
    if(!empty($_SESSION['success'])){
        require_once COMPONENTS . '/success-alert.tpl.php';
        unset($_SESSION['success']);
    }

    if(!empty($_SESSION['error'])){
        require_once COMPONENTS . '/danger-alert.tpl.php';
        unset($_SESSION['error']);
    }
}