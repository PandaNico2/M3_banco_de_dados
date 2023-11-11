<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber dados do formulário
    $titulo = $_POST["titulo"];
    $ano_publicacao = $_POST["ano_publicacao"];
    $isbn = $_POST["isbn"];
    $numero_paginas = $_POST["numero_paginas"];
    $sinopse = $_POST["sinopse"];
    $livro_id_genero = $_POST["livro_id_genero"];
    $livro_id_editora = $_POST["livro_id_editora"];
    $livro_id_idioma = $_POST["livro_id_idioma"];
    

    $sql = "INSERT INTO livro (titulo, ano_publicacao, isbn, numero_paginas, sinopse, livro_id_genero, livro_id_editora, livro_id_idioma) 
    VALUES ('$titulo', $ano_publicacao, $isbn, $numero_paginas, '$sinopse', $livro_id_genero, $livro_id_editora, $livro_id_idioma);";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar usuário: " . $conn->error;
    }

    $conn->close();
}
