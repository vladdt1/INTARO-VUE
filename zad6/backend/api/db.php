<?php
header('Access-Control-Allow-Origin: *');
$servername = "localhost";
$username = "root";
$password = "";
$database = "intarolab7";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $database);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
