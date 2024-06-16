<?php
session_start();

require_once CORE . '/classes/Validator.php';

/**
 * @var Database $db
 */

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

    if ($validation->hasErrors()) {
        d($validation->getErrors());
    }else{

        if ($db->query("INSERT INTO `posts` (`title`, `content`) VALUES(:title, :content)", $data)) {
            echo "OK";
        }else{
            echo "Database error";
        }

        // redirect('/posts/create');

    }

}

require VIEWS . '/post-create.tpl.php'; 