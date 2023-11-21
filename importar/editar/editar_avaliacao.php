<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_avaliacao');
$comentario = filter_input(INPUT_POST, 'comentario');
$data_comentario = filter_input(INPUT_POST, 'data_comentario');
$avaliacao_id_livro = filter_input(INPUT_POST, 'avaliacao_id_livro');
$avaliacao_id_leitor = filter_input(INPUT_POST, 'avaliacao_id_leitor');
$avaliacao_id_classificacao = filter_input(INPUT_POST, 'avaliacao_id_classificacao');

if ($id && $comentario && $data_comentario && $avaliacao_id_livro && $avaliacao_id_leitor && $avaliacao_id_classificacao) {
    $sql = $conn->prepare("UPDATE avaliacao SET `comentario` = ?, `data_comentario` = ?, `avaliacao_id_livro` = ?, `avaliacao_id_leitor` = ?, `avaliacao_id_classificacao` = ? WHERE `id_avaliacao` = ?");
    $sql->bind_param('sssssi', $comentario, $data_comentario, $avaliacao_id_livro, $avaliacao_id_leitor, $avaliacao_id_classificacao, $id);

    if ($sql->execute() === TRUE) {
        // echo "Alterado com sucesso";
        header("Location: /m3_banco_de_dados/telas_ver/ver_avaliacao.php");
        exit;
    } else {
        echo "Erro na atualização: " . $sql->error;
    }

    $sql->close();
    exit;
} else {
    echo "Erro nos dados recebidos ou dados ausentes.<br>";

    echo "id: $id <br>";
    echo "Comentario: $comentario <br>";
    echo "Data comentario: $data_comentario <br>";
    echo "avaliacao_id_livro: $avaliacao_id_livro <br>";
    echo "avaliacao_id_leitor: $avaliacao_id_leitor <br>";
    echo "avaliacao_id_classificacao: $avaliacao_id_classificacao <br>";
}
?>
