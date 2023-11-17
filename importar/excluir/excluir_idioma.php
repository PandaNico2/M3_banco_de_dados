<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');

if ($id !== null && $id !== false) {
    $sql_autor_livro = $conn->prepare("DELETE FROM idioma WHERE id_idioma = ?");
    $sql_autor_livro->bind_param('i', $id);
    $sql_autor_livro->execute();
    $sql_autor_livro->close();
}

header("Location: /m3_banco_de_dados/telas_ver/ver_idioma.php");
exit;
?>