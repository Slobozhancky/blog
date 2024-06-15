<?php
session_start();
/**
 * @var Database $db
 */

$title = "New Post";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fillable = ['title', 'content'];
    $data = vlidateInputsWithForm($fillable);

    $errors = validateOnEmpty($data);

    if (empty($errors)) {
        $newPost = $db->query("INSERT INTO `posts` (`title`, `content`) VALUES(?, ?)", [$data['title'], $data['content']]);
    }

    d($errors);

}

require VIEWS . '/post-create.tpl.php'; 