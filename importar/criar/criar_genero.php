<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$genero = filter_input(INPUT_POST, 'genero');

if ($genero) {
    try {
        $sql = $conn->prepare("INSERT INTO genero (genero) VALUES (?)");

        $sql->bind_param('s', $genero);
        
        $sql->execute();
        
        header('Location: /m3_banco_de_dados/telas_ver/ver_genero.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir genero: " . $e->getMessage();
        header('Location: /m3_banco_de_dados/telas_add/add_genero.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
