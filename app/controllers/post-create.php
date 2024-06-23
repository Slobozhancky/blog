<?php
session_start();

use Core\Classes\Validator;

$title = "Create new Post";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fillable = ['title', 'content', 'excerpt'];
    $data = validateInputsWithForm($fillable);

    $validator = new Validator;

    $data_for_validate = [
        'title' => 'title 1234134',
        'content' => 'title 1234134',
        'email' => 'test123123@gmail.com',
        'password' => '12312313212',
        'repassword' => '12312313212',
    ];

    $validation = $validator->validate($data_for_validate, $rules = [
        'title' => [
            'required' => true,
            'min' => 3,
            'max' => 20
        ],

        'excerpt' => [
            'required' => true,
            'min' => 3,
            'max' => 20
        ],

        'content' => [
            'required' => true,
            'min' => 10,
            'max' => 100
        ],
        'email' => [
            'email' => true,
        ],
        'password' => [
            'required' => true,
            'min' => 6,
            'max' => 16,
        ],
        'repassword' => [
            'match' => true,
        ],

    ]);

    if (!$validation->hasErrors()) {
        if ($db->query("INSERT INTO `posts` (`title`, `excerpt`, `content`) VALUES(:title, :excerpt, :content)", $data)) {
             $_SESSION['success'] = 'Новий пост було створено';
        }else{
            $_SESSION['error'] = "Database Error";
        }

        // redirect();
    }

}

require VIEWS . '/post-create.tpl.php'; 