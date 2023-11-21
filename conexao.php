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

<!-- <h1>Pendente</h1>
<ul>
    <li>Alterar FK</li>
    <li>Alets</li>
    <li>style alter</li>
    <li>style vizualizar</li>
    <li>Definir pesquisas</li>
</ul>

<br> -->

