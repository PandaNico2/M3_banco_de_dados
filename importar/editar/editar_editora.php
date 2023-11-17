<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_editora');
$nome = filter_input(INPUT_POST, 'nome');
$localizacao = filter_input(INPUT_POST, 'localizacao');


if ($id && $nome && $localizacao) {
    $sql = $conn->prepare("UPDATE editora SET nome = ?, localizacao = ? WHERE id_editora = ?");
    $sql->bind_param('ssi', $nome, $localizacao, $id);
    $sql->execute();
    $sql->close();

    header('Location: /m3_banco_de_dados/telas_ver/ver_editora.php');
    exit;
} else {
    header('Location: /m3_banco_de_dados/telas_ver/ver_editora.php');
    exit;
}
?>
