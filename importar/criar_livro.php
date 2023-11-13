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

    $conn->close();
}

// require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

//     $titulo = filter_input(INPUT_POST, 'titulo');
//     $ano_publicacao = filter_input(INPUT_POST, 'ano_publicacao');
//     $isbn = filter_input(INPUT_POST, 'isbn');
//     $numero_paginas = filter_input(INPUT_POST, 'numero_paginas');
//     $sinopse = filter_input(INPUT_POST, 'sinopse');
//     $livro_id_genero = filter_input(INPUT_POST, 'livro_id_genero');
//     $livro_id_editora = filter_input(INPUT_POST, 'livro_id_editora');
//     $livro_id_idioma = filter_input(INPUT_POST, 'livro_id_idioma');

//     $sql = $conn->prepare("INSERT INTO livro (titulo, ano_publicacao, isbn, numero_paginas, sinopse, livro_id_genero, livro_id_editora, livro_id_idioma) 
//     VALUES (:titulo, :ano_publicacao, :isbn, :numero_paginas, :sinopse, :livro_id_genero, :livro_id_editora, :livro_id_idioma);");

//     $sql->bindValue(':titulo', $titulo);
//     $sql->bindValue(':ano_publicacao', $ano_publicacao);
//     $sql->bindValue(':isbn', $isbn);
//     $sql->bindValue(':numero_paginas', $numero_paginas);
//     $sql->bindValue(':sinopse', $sinopse);
//     $sql->bindValue(':livro_id_genero', $livro_id_genero);
//     $sql->bindValue(':livro_id_editora', $livro_id_editora);
//     $sql->bindValue(':livro_id_editora', $livro_id_editora);

//     $sql->execute();

//     header(('Location: index.php'));


