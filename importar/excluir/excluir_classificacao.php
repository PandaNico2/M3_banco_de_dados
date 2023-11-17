<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');

if ($id !== null && $id !== false) {
    $sql = $conn->prepare("DELETE FROM classificacao WHERE id_classificacao = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
    $sql->close();
}

header("Location: /m3_banco_de_dados/telas_ver/ver_classificacao.php");
exit;
?>