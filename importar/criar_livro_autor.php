<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

// livro
$titulo = filter_input(INPUT_POST, 'titulo');
$ano_publicacao = filter_input(INPUT_POST, 'ano_publicacao');
$isbn = filter_input(INPUT_POST, 'isbn');
$numero_paginas = filter_input(INPUT_POST, 'numero_paginas');
$sinopse = filter_input(INPUT_POST, 'sinopse');
$livro_id_genero = filter_input(INPUT_POST, 'livro_id_genero');
$livro_id_editora = filter_input(INPUT_POST, 'livro_id_editora');
$livro_id_idioma = filter_input(INPUT_POST, 'livro_id_idioma');

// autor
$nome = filter_input(INPUT_POST, 'nome_autor');
$nacionalidade = filter_input(INPUT_POST, 'nacionalidade_autor');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento_autor');

// livro autor
$livro_livro_autor = filter_input(INPUT_POST, 'livro_livro_autor');

if ($titulo && $ano_publicacao && $isbn && $numero_paginas && $sinopse && $livro_id_genero && $livro_id_editora && $livro_id_idioma && $nome && $nacionalidade && $data_nascimento) {
    try {
        // Inserir autor
        $sql_autor = $conn->prepare("INSERT INTO autores (nome, nacionalidade, data_nascimento) VALUES (?, ?, ?)");
        $sql_autor->bind_param('sss', $nome, $nacionalidade, $data_nascimento);
        $sql_autor->execute();

        // Obter o ID do autor recém-inserido
        $id_autor = $conn->insert_id;

        // Inserir livro
        $sql_livro = $conn->prepare("INSERT INTO livro (titulo, ano_publicacao, isbn, numero_paginas, sinopse, livro_id_genero, livro_id_editora, livro_id_idioma)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sql_livro->bind_param('ssssssss', $titulo, $ano_publicacao, $isbn, $numero_paginas, $sinopse, $livro_id_genero, $livro_id_editora, $livro_id_idioma);
        $sql_livro->execute();

        // Obter o ID do livro recém-inserido
        $id_livro = $conn->insert_id;

        // Inserir relação autor_livro
        $sql_livro_autor = $conn->prepare("INSERT INTO autor_livro (id_autor_livro, id_livro_autor) VALUES (?, ?)");
        $sql_livro_autor->bind_param('ii', $id_autor, $id_livro);
        $sql_livro_autor->execute();

        header('Location: ../telas_ver/ver_livro.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir livro: " . $e->getMessage();
        header('Location: ../telas_ver/ver_livro.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
