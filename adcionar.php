<?php
require_once('./conexao.php');

// Fetch livro data from the database
$sql = "SELECT autores.id_autores AS id_autor, autores.nome AS nome_autor, livro.id_livro, livro.titulo, livro.ano_publicacao, livro.livro_id_editora, editora.nome AS nome_editora
FROM autores
JOIN autor_livro ON autores.id_autores = autor_livro.id_autor_livro
JOIN livro ON autor_livro.id_livro_autor = livro.id_livro
JOIN editora ON livro.livro_id_editora = editora.id_editora;
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data as JSON
    $livros = array();
    while ($row = $result->fetch_assoc()) {
        $livros[] = $row;
    }
    echo json_encode($livros);
} else {
    echo "0 results";
}

$conn->close();
?>