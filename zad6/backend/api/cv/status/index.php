<?php
require_once "../../db.php";

// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow the following HTTP methods
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Allow the following headers
header("Access-Control-Allow-Headers: *");

$data = json_decode(file_get_contents("php://input"), true);


    $id = $data['id'];
    $status = $data['status'];

    $sql = "UPDATE users SET status='$status' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("message" => "Data successfully updated"));
    } else {
        echo json_encode(array("message" => "Error updating data: " . $conn->error));
    }

?>
