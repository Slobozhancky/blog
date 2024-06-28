<?php

use Core\Classes\Validator;
$title = "Create new Post";


global $db;


$fillable = ['title', 'content', 'excerpt'];
$data = validateInputsWithForm($fillable);

$validator = new Validator;

$validation = $validator->validate($data, $rules = [
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
        $res['answer'] = $_SESSION['success'] = 'New post, was created';
    }else{
        $res['answer'] = $_SESSION['error'] = "Database Error";
    }

    if ($validation->hasErrors()) {
        echo json_encode($validation->getErrors(), 1);
        // die;
    }else{
        echo json_encode($res);
        // die;
    }

    // redirect('/');

}else {
    require VIEWS . '/posts/create.tpl.php';
}