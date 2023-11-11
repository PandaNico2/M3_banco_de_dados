<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_livro"])) {
    // Receber dados do formulário
    $id_livro = $_POST["id_livro"];
    $titulo = $_POST["titulo"];
    $ano_publicacao = $_POST["ano_publicacao"];
    $livro_id_editora = $_POST["livro_id_editora"];

    // Montar a consulta SQL para atualização
    $sqlUpdate = "UPDATE livro SET titulo='$titulo', ano_publicacao='$ano_publicacao', livro_id_editora='$livro_id_editora' WHERE id_livro='$id_livro'";
    
    // Executar a consulta SQL de atualização
    if ($conn->query($sqlUpdate) === TRUE) {
        echo "Livro atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o livro: " . $conn->error;
    }
}?>