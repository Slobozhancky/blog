<?php
// session_start();
$title = "Blog";

$posts = $db->query("SELECT * FROM posts ORDER BY `id` DESC")->findAll();
$list_group = $db->query("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 3")->findAll();

// d($_SESSION['success'] ?? null);

require VIEWS . '/home.tpl.php';