<?php

/** @var $router */ // цю інфу слід вказати, щоб не виникало помилки

//Posts
$router->get('', 'posts/index.php');
$router->get('posts', 'posts/show.php');
$router->get('posts/create', 'posts/create.php');
$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php');

//Pages
$router->get('about', 'about.php');
$router->get('contacts', 'contacts.php');


// return $routes = [
//     '' => 'home.php',
//     'about' => 'about.php',
//     'post' => 'post.php',
//     'contacts' => 'contacts.php',
//     'admin' => 'admin.php',
//     'posts/create' => 'post-create.php',
// ];