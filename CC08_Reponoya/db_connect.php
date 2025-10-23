<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "webapi_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]));
}
?>

