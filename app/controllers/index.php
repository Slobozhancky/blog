<?php

$title = "Blog";

$posts = [

    1 => [
        'title' => 'title 1',
        'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        'slug' => 'title 1'
    ],
    2 => [
        'title' => 'title 1',
        'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, aut!',
        'slug' => 'title 2'
    ],
    3 => [
        'title' => 'title 1',
        'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores at, sapiente voluptatum quos mollitia aut.',
        'slug' => 'title 3'
    ]

];

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


require VIEWS . '/index.tpl.php';