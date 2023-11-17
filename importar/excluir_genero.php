<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');

if ($id !== null && $id !== false) {
    $sql = $conn->prepare("DELETE FROM genero WHERE id_genero = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
    $sql->close();
}

header('Location: ../telas_ver/ver_genero.php');
exit;
?>