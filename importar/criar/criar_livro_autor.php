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
$nome = filter_input(INPUT_POST, 'nome');
$nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');

// livro autor
$livro_livro_autor = filter_input(INPUT_POST, 'livro_livro_autor');

// Palavra Chave
$palavra = filter_input(INPUT_POST, 'palavra');

// palavra chave livro
$livro_palavrachave = filter_input(INPUT_POST, 'livro_palavrachave');


if ($titulo && $ano_publicacao && $isbn && $numero_paginas && $sinopse && $livro_id_genero && $livro_id_editora && $livro_id_idioma) {
    try {
        // Verificar se palavra chave já existe
        $sql_verifica_palavraChave = $conn->prepare("SELECT id_palavra_chave FROM palavra_chave WHERE palavra = ?");
        $sql_verifica_palavraChave->bind_param('s', $palavra);
        $sql_verifica_palavraChave->execute();
        $resultado_palavraChave = $sql_verifica_palavraChave->get_result();

        if ($resultado_palavraChave->num_rows > 0) {
            // palavra chave já existe, obter o ID da palavra chave existente
            $row = $resultado_palavraChave->fetch_assoc();
            $id_palavra_chave = $row['id_palavra_chave'];
        } else {
            // palavra chave não existe, inserir novo palavra chave
            $sql_palavraChave = $conn->prepare("INSERT INTO palavra_chave (palavra) VALUES (?)");
            $sql_palavraChave->bind_param('s', $palavra);
            $sql_palavraChave->execute();

            // Obter o ID da palavra chave recém-inserido
            $id_palavra_chave = $conn->insert_id;
        }


        // Verificar se o autor já existe
        $sql_verifica_autor = $conn->prepare("SELECT id_autores FROM autores WHERE nome = ?");
        $sql_verifica_autor->bind_param('s', $nome); // Change $palavra to $nome
        $sql_verifica_autor->execute();
        $resultado_autor = $sql_verifica_autor->get_result();

        if ($resultado_autor->num_rows > 0) {
            // autor já existe, obter o ID do autor existente
            $row = $resultado_autor->fetch_assoc();
            $id_autores = $row['id_autores'];
        } else {
            // autor não existe, inserir novo autor
            $sql_autor = $conn->prepare("INSERT INTO autores (nome, nacionalidade, data_nascimento) VALUES (?, ?, ?)");
            $sql_autor->bind_param('sss', $nome, $nacionalidade, $data_nascimento);
            $sql_autor->execute();

            // Obter o ID do autor recém-inserido
            $id_autores = $conn->insert_id;
        }



        // Inserir livro
        $sql_livro = $conn->prepare("INSERT INTO livro (titulo, ano_publicacao, isbn, numero_paginas, sinopse, livro_id_genero, livro_id_editora, livro_id_idioma) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sql_livro->bind_param('ssssssss', $titulo, $ano_publicacao, $isbn, $numero_paginas, $sinopse, $livro_id_genero, $livro_id_editora, $livro_id_idioma);
        $sql_livro->execute();

        // Obter o ID do livro recém-inserido
        $id_livro = $conn->insert_id;

        // Inserir relação autor_livro
        $sql_livro_autor = $conn->prepare("INSERT INTO autor_livro (id_autor_livro, id_livro_autor) VALUES (?, ?)");
        $sql_livro_autor->bind_param('ii', $id_autores, $id_livro);
        $sql_livro_autor->execute();

        // Inserir relação livro_palavrachave
        $sql_livro_palavraChave = $conn->prepare("INSERT INTO livro_palavrachave (id_livro_palavraChave, id_palavraChave_livro) VALUES (?, ?)");
        $sql_livro_palavraChave->bind_param('ii', $id_livro, $id_palavra_chave);
        $sql_livro_palavraChave->execute();

        header('Location: /m3_banco_de_dados/telas_ver/ver_livro.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir livro: " . $e->getMessage();
        header('Location: /telas_ver/ver_livro.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
