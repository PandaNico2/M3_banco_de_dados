<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');

if ($id !== null && $id !== false) {
    $sql_emprestimo = $conn->prepare("DELETE FROM emprestimo WHERE id_emprestimo = ?");
    $sql_emprestimo->bind_param('i', $id);
    $sql_emprestimo->execute();
    $sql_emprestimo->close();
}

header('Location: /m3_banco_de_dados/telas_ver/ver_autor.php');
exit;
?>