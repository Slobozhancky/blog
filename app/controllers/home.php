<?php

$title = "Blog";

$posts = $posts = $db->query("SELECT * FROM `posts`")->fetchAll();
$list_group = $db->query("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 3")->fetchAll();


require VIEWS . '/home.tpl.php';