<?php
require_once "../db.php";
header("Access-Control-Allow-Origin: *"); // Разрешить доступ с любого домена
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Разрешенные методы
header("Access-Control-Allow-Headers: *"); // Разрешенные заголовки

// Выполняем запрос к базе данных
$sql = "SELECT id, proff, city, photo, name, birstday, obraz, infoobraz, phone, email, mony, description, info, status FROM users";
$result = $conn->query($sql);

// Проверяем результат запроса
if ($result->num_rows > 0) {
    // Выводим данные в JSON формате
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    // В случае отсутствия данных возвращаем пустой массив
    echo json_encode([]);
}

// Закрываем соединение с базой данных
$conn->close();

?>