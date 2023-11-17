<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_palavra_chave');
$palavra = filter_input(INPUT_POST, 'palavra');


if ($id && $palavra) {
    $sql = $conn->prepare("UPDATE palavra_chave SET palavra = ? WHERE id_palavra_chave = ?");
    $sql->bind_param('si', $palavra, $id);
    $sql->execute();
    $sql->close();

    header('Location: /m3_banco_de_dados/telas_ver/ver_palavraChave.php');
    exit;
} else {
    echo "erro!";
    header('Location: /m3_banco_de_dados/telas_ver/ver_palavraChave.php');
    exit;
}
?>
