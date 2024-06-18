<?php
session_start();

use Core\Classes\Validator;

$title = "Create new Post";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fillable = ['title', 'content'];
    $data = validateInputsWithForm($fillable);

    $validator = new Validator;

    $validation = $validator->validate($data, $rules = [
        'title' => [
            'required' => true,
            'min' => 3,
            'max' => 20
        ],

        'content' => [
            'required' => true,
            'min' => 10,
            'max' => 100
        ],
    ]);

    if (!$validation->hasErrors()) {
        if ($db->query("INSERT INTO `posts` (`title`, `content`) VALUES(:title, :content)", $data)) {
             $_SESSION['success'] = 'Новий пост було створено';
        }else{
            $_SESSION['error'] = "Database Error";
        }

        redirect();
    }

}

require VIEWS . '/post-create.tpl.php'; 