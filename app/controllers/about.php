<?php

/**
 * @var Database $db
 */

$title = "About";

$content = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe nam iusto deleniti neque vero culpa dolore recusandae qui atque molestias exercitationem, repellendus cumque a aliquid cupiditate nemo, quos optio sed cum eveniet sint? Sint perferendis magni minus, sapiente provident deserunt?';

$list_group = $db->query("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 3")->findAll();


require VIEWS . '/about.tpl.php';