<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_idioma');
$nome = filter_input(INPUT_POST, 'nome');


if ($id && $nome) {
    $sql = $conn->prepare("UPDATE idioma SET nome = ? WHERE id_idioma = ?");
    $sql->bind_param('si', $nome, $id);
    $sql->execute();
    $sql->close();

    header('Location: /m3_banco_de_dados/telas_ver/ver_idioma.php');
    exit;
} else {
    echo "erro!";
    header('Location: /m3_banco_de_dados/telas_ver/ver_idioma.php');
    exit;
}
?>
