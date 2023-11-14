<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$titulo = filter_input(INPUT_POST, 'titulo');
$ano_publicacao = filter_input(INPUT_POST, 'ano_publicacao');
$isbn = filter_input(INPUT_POST, 'isbn');
$numero_paginas = filter_input(INPUT_POST, 'numero_paginas');
$sinopse = filter_input(INPUT_POST, 'sinopse');
$livro_id_genero = filter_input(INPUT_POST, 'livro_id_genero');
$livro_id_editora = filter_input(INPUT_POST, 'livro_id_editora');
$livro_id_idioma = filter_input(INPUT_POST, 'livro_id_idioma');

if ($titulo && $ano_publicacao && $isbn && $numero_paginas && $sinopse && $livro_id_genero && $livro_id_editora && $livro_id_idioma ) {
    try {
        $sql = $conn->prepare("INSERT INTO livro (titulo, ano_publicacao, isbn, numero_paginas, sinopse, livro_id_genero, livro_id_editora, livro_id_idioma)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?);");

        $sql->bind_param('ssssssss', $titulo, $ano_publicacao, $isbn, $numero_paginas, $sinopse, $livro_id_genero, $livro_id_editora, $livro_id_idioma);
        
        $sql->execute();
        
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
