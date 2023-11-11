<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

var_dump($_POST); 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_livro"])) {
    // Receber o ID do livro a ser excluído
    $id_livro = $_POST["livroId"];
    
    echo "ID do Livro a ser excluído: " . $livroId;

    // Montar a consulta SQL para exclusão
    $sql = "
        SET foreign_key_checks = 0;
        
        DELETE FROM autor_livro WHERE id_livro_autor = (SELECT id_livro FROM livro WHERE id_livro = '$id_livro');
        
        DELETE FROM livro_palavrachave WHERE id_livro_palavraChave = (SELECT id_livro FROM livro WHERE id_livro = '$id_livro');
        
        DELETE FROM livro WHERE id_livro = '$id_livro';
        
        SET foreign_key_checks = 1;
    ";

    // Executar a consulta SQL de exclusão
    if ($conn->multi_query($sql) === TRUE) {
        do {
            // Aguardar o término da execução de cada instrução
        } while ($conn->more_results() && $conn->next_result());
        echo "Livro excluído com sucesso!";
    } else {
        echo "Erro ao excluir o livro: " . $conn->error;
    } 
}
