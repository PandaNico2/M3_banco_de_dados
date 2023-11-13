<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_autores');
$nome = filter_input(INPUT_POST, 'nome');
$nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');

if ($id && $nome && $nacionalidade && $data_nascimento) {
    $sql = $conn->prepare("UPDATE autores SET `nome` = ?, `nacionalidade` = ?, `data_nascimento` = ? WHERE `id_autores` = ?");
    $sql->bind_param('sssi', $nome, $nacionalidade, $data_nascimento, $id);
    $sql->execute();
    $sql->close();

    header("Location: /m3_banco_de_dados/telas_ver/ver_autor.php");
    exit;
} else {
    header("Location: /m3_banco_de_dados/telas_ver/ver_autor.php");
    exit;
}
?>
