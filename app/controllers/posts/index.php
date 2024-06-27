<?php
// session_start();
global $db;
$title = "Blog";

$posts = $db->query("SELECT * FROM posts ORDER BY `id` DESC")->findAll();
$list_group = $db->query("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 3")->findAll();

// d($_SESSION['success'] ?? null);

require VIEWS . '/posts/index.tpl.php';