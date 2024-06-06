<?php

$title = "About";

$content = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe nam iusto deleniti neque vero culpa dolore recusandae qui atque molestias exercitationem, repellendus cumque a aliquid cupiditate nemo, quos optio sed cum eveniet sint? Sint perferendis magni minus, sapiente provident deserunt?';

$list_group = [
    1 => [
        'title' => 'title 1',
        'slug' => lcfirst(str_replace(' ', '-', 'title 1'))
    ],
    2 => [
        'title' => 'title 2',
        'slug' => lcfirst(str_replace(' ', '-', 'title 2'))
    ],
    3 => [
        'title' => 'title 3',
        'slug' => lcfirst(str_replace(' ', '-', 'title 3'))
    ],
    4 => [
        'title' => 'title 4',
        'slug' => lcfirst(str_replace(' ', '-', 'title 4'))
    ],
];

require 'about.tpl.php';