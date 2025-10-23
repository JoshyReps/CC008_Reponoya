<?php
header("Content-Type: application/json");
include "db_connect.php";

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->name) && !empty($data->email)) {
    $sql = "UPDATE users SET name='$data->name', email='$data->email' WHERE id=$data->id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "User updated successfully"]);
    } else {
        echo json_encode(["error" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["error" => "Incomplete data"]);
}
?>
