<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/config/db.php';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8", $username, $password);
    //echo "Успешное подклюючение к БД: $dbname на $host.";
} catch (PDOException $e) {
    die("Не могу подключиться к $dbname:" . $e->getMessage());
}