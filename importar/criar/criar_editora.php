<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$nome = filter_input(INPUT_POST, 'nome_editora');
$localizacao = filter_input(INPUT_POST, 'localizacao_editora');


if ($nome && $localizacao) {
    try {
        $sql = $conn->prepare("INSERT INTO editora (nome, localizacao) VALUES (?, ?)");

        $sql->bind_param('ss', $nome, $localizacao);
        
        $sql->execute();
        
        header('Location: /m3_banco_de_dados/telas_ver/ver_editora.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir autor: " . $e->getMessage();
        header('Location: /m3_banco_de_dados/telas_add/add_editora.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>

