<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_leitor');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$endereco = filter_input(INPUT_POST, 'endereco');


if ($id && $nome && $email && $data_nascimento && $endereco) {
    $sql = $conn->prepare("UPDATE leitor SET nome = ?, email = ?, data_nascimento = ?, endereco = ? WHERE id_leitor = ?");
    $sql->bind_param('ssssi', $nome, $email, $data_nascimento, $endereco, $id);
    $sql->execute();
    $sql->close();

    header('Location: /m3_banco_de_dados/telas_ver/ver_leitor.php');
    exit;
} else {
    echo "erro!";
    header('Location: /m3_banco_de_dados/telas_ver/ver_leitor.php');
    exit;
}
?>

