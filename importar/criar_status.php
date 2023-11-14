<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$status = filter_input(INPUT_POST, 'status');

if ($status) {
    try {
        $sql = $conn->prepare("INSERT INTO status (status) VALUES (?)");

        $sql->bind_param('s', $status);
        
        $sql->execute();
        
        header('Location: ../telas_ver/ver_status.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir status: " . $e->getMessage();
        header('Location: ../telas_ver/ver_status.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
