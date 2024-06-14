<?php

// Підключення констант та різних пакетів для PHP
require_once '../config/constants.php';
require_once VENDOR . '/autoload.php';
// =========================================

// Підключення пакетів DOTENV 
$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();
// =========================================

// Підключаємо допоміжні функційї
require_once CORE . '/func.php';
// =========================================

// Зєднання з базою даних
$db_config = require CONFIG . '/db_conf.php';
require_once CORE . '/classes/Database.php';
// =========================================
$db = (Database::getInstance())->getConnection($db_config);

// Підключення відповідних роутінгів
require_once CORE . '/router.php';
// =========================================
