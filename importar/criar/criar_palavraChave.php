<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$palavra = filter_input(INPUT_POST, 'palavra');

if ($palavra) {
    try {
        $sql = $conn->prepare("INSERT INTO palavra_chave (palavra) VALUES (?)");

        $sql->bind_param('s', $palavra);
        
        $sql->execute();
        
        header('Location: /m3_banco_de_dados/telas_ver/ver_palavraChave.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir palavra: " . $e->getMessage();
        header('Location: /telas_ver/ver_palavraChave.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
