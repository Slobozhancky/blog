<?php
session_start();
/**
 * @var Database $db
 */

$title = "Create new Post";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fillable = ['title', 'content'];
    $data = validateInputsWithForm($fillable);

    $errors = validateOnEmpty($data);

    if (empty($errors)) {
        $newPost = $db->query("INSERT INTO `posts` (`title`, `content`) VALUES(:title, :content)", $data);
        redirect('/posts/create');
    }


}

require VIEWS . '/post-create.tpl.php'; 