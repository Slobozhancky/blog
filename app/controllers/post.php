<?php
$title = "Post ";

/**
 * @var Database $db
 */

$id = (int)$_GET['id'] ?? 0;
$title = "Post {$id}";

$post = $db->query("SELECT * FROM posts WHERE id = ? LIMIT 1", [$id])->findOrFail();

$list_group = $db->query("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 3")->findAll();

require VIEWS . '/post.tpl.php'; 