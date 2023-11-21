<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id_livro_palavraChave = filter_input(INPUT_POST, 'id_livro_palavraChave');
$id_palavraChave_livro = filter_input(INPUT_POST, 'id_palavraChave_livro');

if ($id_livro_palavraChave && $id_palavraChave_livro) {
    try {
        $sql = $conn->prepare("INSERT INTO livro_palavrachave (id_livro_palavraChave, id_palavraChave_livro) VALUES (?, ?)");

        $sql->bind_param('ss', $id_livro_palavraChave, $id_palavraChave_livro);
        
        $sql->execute();
        
        header('Location: /m3_banco_de_dados/telas_ver/ver_livro.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir autor livro: " . $e->getMessage();
        header('Location: /m3_banco_de_dados/telas_add/add_lixo_teste.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
