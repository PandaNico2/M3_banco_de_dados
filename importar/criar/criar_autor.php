<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$nome = filter_input(INPUT_POST, 'nome_autor');
$nacionalidade = filter_input(INPUT_POST, 'nacionalidade_autor');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento_autor');

if ($nome && $nacionalidade && $data_nascimento) {
    try {
        $sql = $conn->prepare("INSERT INTO autores (nome, nacionalidade, data_nascimento) VALUES (?, ?, ?)");

        $sql->bind_param('sss', $nome, $nacionalidade, $data_nascimento);
        
        $sql->execute();
        
        echo "AUTOR INSERIDO!!!";
        header('Location: /m3_banco_de_dados/telas_ver/ver_autor.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir autor: " . $e->getMessage();
        header('Location: /m3_banco_de_dados/telas_add/add_autor.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>

<a href="">aqui</a>

