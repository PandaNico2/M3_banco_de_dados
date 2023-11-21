<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_emprestimo');
$data_emprestimo = filter_input(INPUT_POST, 'data_emprestimo');
$data_devolucao = filter_input(INPUT_POST, 'data_devolucao');
$emprestimo_id_livro = filter_input(INPUT_POST, 'emprestimo_id_livro');
$emprestimo_id_leitor = filter_input(INPUT_POST, 'emprestimo_id_leitor');
$emprestimo_id_status = filter_input(INPUT_POST, 'emprestimo_id_status');


if ($id && $data_emprestimo && $data_devolucao) {
    $sql = $conn->prepare("UPDATE emprestimo SET data_emprestimo = ?, data_devolucao = ?, emprestimo_id_livro = ?, emprestimo_id_leitor = ?, emprestimo_id_status = ? WHERE id_emprestimo = ?");
    $sql->bind_param('sssssi', $data_emprestimo, $data_devolucao, $emprestimo_id_livro, $emprestimo_id_leitor, $emprestimo_id_status, $id);
    $sql->execute();
    $sql->close();

    header('Location: /m3_banco_de_dados/telas_ver/ver_emprestimo.php');
    exit;
} else {
    header('Location: /m3_banco_de_dados/telas_ver/ver_emprestimo.php');
    exit;
}
?>
