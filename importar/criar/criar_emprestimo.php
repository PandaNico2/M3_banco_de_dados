<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$data_emprestimo = filter_input(INPUT_POST, 'data_emprestimo');
$data_devolucao = filter_input(INPUT_POST, 'data_devolucao');
$emprestimo_id_livro = filter_input(INPUT_POST, 'emprestimo_id_livro');
$emprestimo_id_leitor = filter_input(INPUT_POST, 'emprestimo_id_leitor');
$emprestimo_id_status = filter_input(INPUT_POST, 'emprestimo_id_status');

if ($data_emprestimo && $data_devolucao && $emprestimo_id_livro && $emprestimo_id_leitor && $emprestimo_id_status) {
    try {
        $sql = $conn->prepare("INSERT INTO emprestimo (data_emprestimo, data_devolucao, emprestimo_id_livro, emprestimo_id_leitor, emprestimo_id_status) VALUES (?, ?, ?, ?, ?)");

        $sql->bind_param('sssss', $data_emprestimo, $data_devolucao, $emprestimo_id_livro, $emprestimo_id_leitor, $emprestimo_id_status);
        
        $sql->execute();
        
        header('Location: /m3_banco_de_dados/telas_ver/ver_emprestimo.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir empréstimo: " . $e->getMessage();
        // Remova a linha abaixo se não quiser redirecionar em caso de erro
        header('Location: /m3_banco_de_dados/telas_add/add_emprestimo.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
