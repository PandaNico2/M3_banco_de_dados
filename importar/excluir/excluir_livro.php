<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');

if ($id !== null && $id !== false) {
    // Excluir da tabela livro_palavrachave
    $sql_livro_palavraChave = $conn->prepare("DELETE FROM livro_palavrachave WHERE id_livro_palavraChave = ?");
    $sql_livro_palavraChave->bind_param('i', $id);
    $sql_livro_palavraChave->execute();
    $sql_livro_palavraChave->close();

    // Excluir da tabela autor_livro
    $sql_livro_autor = $conn->prepare("DELETE FROM autor_livro WHERE id_livro_autor = ?");
    $sql_livro_autor->bind_param('i', $id);
    $sql_livro_autor->execute();
    $sql_livro_autor->close();

    // Excluir da tabela livro
    $sql_livro = $conn->prepare("DELETE FROM livro WHERE id_livro = ?");
    $sql_livro->bind_param('i', $id);
    $sql_livro->execute();
    $sql_livro->close();
}

header('Location: /m3_banco_de_dados/telas_ver/ver_livro.php');
exit;
?>