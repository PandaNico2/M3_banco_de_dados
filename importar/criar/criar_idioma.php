<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$nome = filter_input(INPUT_POST, 'nome');

if ($nome) {
    try {
        $sql = $conn->prepare("INSERT INTO idioma (nome) VALUES (?)");

        $sql->bind_param('s', $nome);
        
        $sql->execute();
        
        header('Location: /m3_banco_de_dados/telas_ver/ver_idioma.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir idioma: " . $e->getMessage();
        header('Location: /m3_banco_de_dados/telas_add/add_idioma.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
