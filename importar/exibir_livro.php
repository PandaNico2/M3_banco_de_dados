<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$sql = "SELECT * FROM livro;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $livros = array();
    while ($row = $result->fetch_assoc()) {
        $livros[] = $row;
    }
    echo json_encode($livros);
} else {
    echo "0 results";
}

$conn->close();
?>

