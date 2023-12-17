<?php
require_once "../../db.php";
header("Access-Control-Allow-Origin: *"); // Разрешить доступ с любого домена
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Разрешенные методы
header("Access-Control-Allow-Headers: *"); // Разрешенные заголовки

// Получение данных из POST-запроса
$data = json_decode(file_get_contents("php://input"), true);

// Ваши данные для вставки в базу данных
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
$infoobr = $data['infoobra'];
$status = $data['status'];


// SQL-запрос для вставки данных в базу данных
$sql = "INSERT INTO users (proff, city, photo, name, birstday, obraz, infoobraz, phone, email, mony, description, info, status) 
        VALUES ('$prof', '$cit', '$im', '$fio', '$dat', '$obr', '$infoobr', '$phon', '$email', '$mun', '$skills', '$about', '$status')";

// Выполнение запроса
if ($conn->query($sql) === TRUE) {
    $response = array("status" => "success", "message" => "Данные успешно добавлены в базу данных");
} else {
    $response = array("status" => "error", "message" => "Ошибка при добавлении данных в базу данных: " . $conn->error);
}

// Закрытие соединения
$conn->close();

// Отправка ответа в формате JSON
header('Content-Type: application/json');
echo json_encode($response);
?>