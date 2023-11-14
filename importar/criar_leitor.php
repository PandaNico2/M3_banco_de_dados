<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$endereco = filter_input(INPUT_POST, 'endereco');

if ($nome) {
    try {
        $sql = $conn->prepare("INSERT INTO leitor (nome, email, data_nascimento, endereco) VALUES (?, ?, ?, ?)");

        $sql->bind_param('ssss', $nome, $email, $data_nascimento, $endereco);
        
        $sql->execute();
        
        header('Location: ../telas_ver/ver_leitor.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir leitor: " . $e->getMessage();
        header('Location: ../telas_ver/ver_leitor.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
