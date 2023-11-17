<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$comentario = filter_input(INPUT_POST, 'comentario');
$data_comentario = filter_input(INPUT_POST, 'data_comentario');
$avaliacao_id_livro = filter_input(INPUT_POST, 'avaliacao_id_livro');
$avaliacao_id_leitor = filter_input(INPUT_POST, 'avaliacao_id_leitor');
$avaliacao_id_classificacao = filter_input(INPUT_POST, 'avaliacao_id_classificacao');

if ($comentario && $data_comentario && $avaliacao_id_livro && $avaliacao_id_leitor && $avaliacao_id_classificacao) {
    try {
        $sql = $conn->prepare("INSERT INTO avaliacao (comentario, data_comentario, avaliacao_id_livro, avaliacao_id_leitor, avaliacao_id_classificacao) VALUES (?, ?, ?, ?, ?)");

        $sql->bind_param('sssss', $comentario, $data_comentario, $avaliacao_id_livro, $avaliacao_id_leitor, $avaliacao_id_classificacao);
        
        $sql->execute();

        header('Location: /m3_banco_de_dados/telas_ver/ver_avaliacao.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir autor: " . $e->getMessage();
        header('Location: /m3_banco_de_dados/telas_add/add_avaliacao.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
<a href=""></a>
