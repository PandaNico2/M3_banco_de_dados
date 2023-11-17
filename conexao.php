<?php
$servername = "127.0.0.1";
$username = "root";
// $password = "pandaNico30";
$password = "";
$database = "biblioteca";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
