<?php

$title = "Blog";

/**
 * @var Database $db
 */

$posts = $posts = $db->query("SELECT * FROM posts")->findAll();
$list_group = $db->query("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 3")->findAll();


require VIEWS . '/home.tpl.php';