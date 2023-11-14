<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$comentario = filter_input(INPUT_POST, 'comentario');
$data_comentario = filter_input(INPUT_POST, 'data_comentario');
$avaliacao_id_livro = filter_input(INPUT_POST, 'avaliacao_id_livro');
$avaliacao_id_classificacao = filter_input(INPUT_POST, 'avaliacao_id_classificacao');

if ($nome && $nacionalidade && $data_nascimento) {
    try {
        $sql = $conn->prepare("INSERT INTO autores (nome, nacionalidade, data_nascimento) VALUES (?, ?, ?)");

        $sql->bind_param('sss', $nome, $nacionalidade, $data_nascimento);
        
        $sql->execute();
        
        echo "AUTOR INSERIDO!!!";
        header('Location: C:\xampp\htdocs\m3_banco_de_dados\telas_ver\ver_autor.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir autor: " . $e->getMessage();
        header('Location: C:\xampp\htdocs\m3_banco_de_dados\telas_add\add_autor.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
