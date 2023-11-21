<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');

if ($id !== null && $id !== false) {
    try {
        $sql = $conn->prepare("DELETE FROM palavra_chave WHERE id_palavra_chave = ?");
        $sql->bind_param('i', $id);
        $sql->execute();
        $sql->close();
        echo "Palavra chave excluída com sucesso!";
    } catch (mysqli_sql_exception $e) {
        // Verifica se a exceção é devido a uma restrição de chave estrangeira
        if ($e->getCode() === 1451) {
            echo "Não é possível excluir esta palavra devido a restrições de chave estrangeira em outras tabelas.";
        } else {
            echo "Ocorreu um erro ao excluir a palavra: " . $e->getMessage();
        }
    }
}

header('Location: /m3_banco_de_dados/telas_ver/ver_palavraChave.php');
exit;
