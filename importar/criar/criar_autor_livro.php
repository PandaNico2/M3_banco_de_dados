<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id_autor_livro = filter_input(INPUT_POST, 'id_autor_livro');
$id_livro_autor = filter_input(INPUT_POST, 'id_livro_autor');

if ($id_autor_livro && $id_livro_autor) {
    try {
        $sql = $conn->prepare("INSERT INTO autor_livro (id_autor_livro, id_livro_autor) VALUES (?, ?)");

        $sql->bind_param('ss', $id_autor_livro, $id_livro_autor);
        
        $sql->execute();
        
        header('Location: /m3_banco_de_dados/telas_add/add_livro_palavraChave.php');
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir autor_livro: " . $e->getMessage();
        header('Location: /m3_banco_de_dados/telas_add/add_livro_palavraChave.php');
        exit;
    }
} else {
    echo "ERRO! Preencha todos os campos.";
    exit;
}
?>
       