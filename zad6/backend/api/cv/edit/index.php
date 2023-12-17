<?php
require_once "../../db.php";
header("Access-Control-Allow-Origin: *"); // Разрешить доступ с любого домена
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Разрешенные методы
header("Access-Control-Allow-Headers: *"); // Разрешенные заголовки

// Получение данных из тела запроса
$data = json_decode(file_get_contents("php://input"), true);

// Извлечение данных
$id = $data['id'];
$prof = $data['prof'];
$cit = $data['cit'];
$im = $data['im'];
$fio = $data['fio'];
$dat = $data['dat'];
$obr = $data['obr'];
$phon = $data['phon'];
$email = $data['email'];
$mun = $data['mun'];
$skills = $data['skills'];
$about = $data['about'];
$status = $data['status'];

// Подготовка SQL-запроса для обновления данных
$sql = "UPDATE users SET 
        proff = '$prof',
        city = '$cit',
        photo = '$im',
        name = '$fio',
        birstday = '$dat',
        obraz = '$obr',
        phone = '$phon',
        email = '$email',
        mony = '$mun',
        description = '$skills',
        info = '$about',
        status = '$status'
        WHERE id = '$id'";

// Выполнение запроса и проверка на ошибки
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Данные успешно обновлены"));
} else {
    echo json_encode(array("message" => "Ошибка при обновлении данных: " . $conn->error));
}

// Закрытие соединения с базой данных
$conn->close();
?>