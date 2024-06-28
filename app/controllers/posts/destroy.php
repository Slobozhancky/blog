<?php

global $db;

if ($db->query("DELETE FROM `posts` WHERE `id`=?", [$_POST['id']])) {
    $_SESSION['success'] = "Пост {$_POST['id']} було видалено";
}else{
    $_SESSION['error'] = "Database Error";
}

redirect("/");

