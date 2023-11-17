<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');

if ($id !== null && $id !== false) {
    // Excluir da tabela autor_livro
    $sql_autor_livro = $conn->prepare("DELETE FROM autor_livro WHERE id_autor_livro = ?");
    $sql_autor_livro->bind_param('i', $id);
    $sql_autor_livro->execute();
    $sql_autor_livro->close();

    // Excluir da tabela autores
    $sql_autores = $conn->prepare("DELETE FROM autores WHERE id_autores = ?");
    $sql_autores->bind_param('i', $id);
    $sql_autores->execute();
    $sql_autores->close();
}

header('Location: /m3_banco_de_dados/telas_ver/ver_autor.php');
exit;
?>