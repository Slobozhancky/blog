<?php

/**
 * PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
 * Опис: Встановлює режим отримання даних за замовчуванням як асоціативний масив.
 * 
 * PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
 * Опис: Встановлює режим обробки помилок як виключення (exceptions).
 */

return [
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_DATABASE'],
    'login' => $_ENV['DB_LOGIN'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => $_ENV['DB_CHARSET'],
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ],
];