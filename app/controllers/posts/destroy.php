<?php

global $db;

// php://input:

// Це спеціальний потік (stream) у PHP, який дозволяє читати необроблені дані тіла HTTP-запиту. Використовується переважно для отримання даних з запитів, які використовують методи, такі як POST, PUT, PATCH та DELETE, особливо коли дані передаються у форматах JSON, XML або інші.
// file_get_contents('php://input'):

// Функція file_get_contents читає дані з файлу або потоку. У цьому випадку вона читає дані з потоку php://input.


// якщо в метод json_decode, другим параметром передати true,або цифру 1 (тобто дані які дадуть результат true), ми отримаємо асоціативний масив
$api_data = json_decode(file_get_contents('php://input'), 1);

// ось ця перевірка потрібна для того, щоб ми могли розуміти, з відки саме прийшов запит, тобто по API, або з нашого сайту (у цьому випадку з форми)
$data = $api_data ?? $_POST;

$db->query("DELETE FROM `posts` WHERE `id`=?", [$data['id']]);

if ($db->rowCount()) {
    $res['answer'] = $_SESSION['success'] = "Post {$data['id']} was deleted";
}else{
    $res['answer'] = $_SESSION['error'] = "Database Error";
}

if($api_data){
    echo json_encode($res);
    die;
}

redirect("/");

