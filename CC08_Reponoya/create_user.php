<?php
header("Content-Type: application/json");
include "db_connect.php";

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->name) && !empty($data->email)) {
    $name = $data->name;
    $email = $data->email;

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "User created successfully"]);
    } else {
        echo json_encode(["error" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["error" => "Incomplete data"]);
}
?>
