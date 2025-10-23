<?php
header("Content-Type: application/json");
include "db_connect.php";

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $sql = "DELETE FROM users WHERE id=$data->id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "User deleted successfully"]);
    } else {
        echo json_encode(["error" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["error" => "User ID missing"]);
}
?>
