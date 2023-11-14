<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$num_estrelas = filter_input(INPUT_POST, 'num_estrelas');

if ($num_estrelas) {
    try {
        $sql = $conn->prepare("INSERT INTO classificacao (num_estrelas) VALUES (?)");

        $sql->bind_param('s', $num_estrelas);
        
        $sql->execute();
        
        header('Location: ../telas_ver/ver_classificacao.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir classificacao: " . $e->getMessage();
        header('Location: ../telas_ver/ver_classificacao.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
