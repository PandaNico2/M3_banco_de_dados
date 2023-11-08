<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar usuário: " . $conn->error;
    }

    $conn->close();
}
?>
