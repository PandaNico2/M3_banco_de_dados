<?php
require_once('conexao.php');

$sql = "SELECT titulo, ano_publicacao, isbn FROM livro";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>
