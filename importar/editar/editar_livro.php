<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

// livro
$id = filter_input(INPUT_POST, 'id_livro');
$titulo = filter_input(INPUT_POST, 'titulo');
$ano_publicacao = filter_input(INPUT_POST, 'ano_publicacao');
$isbn = filter_input(INPUT_POST, 'isbn');
$numero_paginas = filter_input(INPUT_POST, 'numero_paginas');
$sinopse = filter_input(INPUT_POST, 'sinopse');
$livro_id_genero = filter_input(INPUT_POST, 'livro_id_genero');
$livro_id_editora = filter_input(INPUT_POST, 'livro_id_editora');
$livro_id_idioma = filter_input(INPUT_POST, 'livro_id_idioma');

if ($id && $titulo && $ano_publicacao && $isbn && $numero_paginas && $sinopse && $livro_id_genero && $livro_id_editora && $livro_id_idioma) {
    $sql = $conn->prepare("UPDATE livro SET `titulo` = ?, `ano_publicacao` = ?, `isbn` = ?, `numero_paginas` = ?, `sinopse` = ?, `livro_id_genero` = ?, `livro_id_editora` = ?, `livro_id_idioma` = ? WHERE `id_livro` = ?");
    $sql->bind_param('ssssssssi', $titulo, $ano_publicacao, $isbn, $numero_paginas, $sinopse, $livro_id_genero, $livro_id_editora, $livro_id_idioma, $id);

    if ($sql->execute() === TRUE) {
        echo "Alterado com sucesso";
        header("Location: /m3_banco_de_dados/telas_ver/ver_livro.php");
        exit;
    } else {
        echo "Erro na atualização: " . $sql->error;
    }

    $sql->close();
    exit;
} else {
    echo "Erro nos dados recebidos ou dados ausentes.<br>";

    echo "id: $id <br>";
    echo "titulo: $titulo <br>";
    echo "ano_publicacao: $ano_publicacao <br>";
    echo "isbn: $isbn <br>";
    echo "numero_paginas: $numero_paginas <br>";
    echo "sinopse: $sinopse <br>";
    echo "livro_id_genero: $livro_id_genero <br>";
    echo "livro_id_editora: $livro_id_editora <br>";
    echo "livro_id_idioma: $livro_id_idioma <br>";
}
?>
