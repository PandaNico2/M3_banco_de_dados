<?php
$id_livro = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id_livro <= 0) {
    echo "ID do livro não fornecido ou inválido.";
    exit;
}

require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$query = $conn->prepare("SELECT
    l.id_livro,
    l.titulo,
    l.ano_publicacao,
    l.isbn,
    l.numero_paginas,
    l.sinopse,
    l.livro_id_genero,
    g.genero,
    l.livro_id_editora,
    ed.nome AS nome_editora,
    l.livro_id_idioma,
    i.nome AS idioma,
    al.id_autor_livro,
    a.nome AS nome_autor
    FROM
    livro l
    JOIN genero g ON l.livro_id_genero = g.id_genero
    JOIN editora ed ON l.livro_id_editora = ed.id_editora
    JOIN idioma i ON l.livro_id_idioma = i.id_idioma
    JOIN autor_livro al ON l.id_livro = al.id_livro_autor
    JOIN autores a ON al.id_autor_livro = a.id_autores
    WHERE id_livro = ?;");
$query->bind_param('i', $id_livro);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $livro = $result->fetch_assoc(); // Apenas uma vez para pegar os dados do livro

    // Agora, colete todos os autores em um array
    $autores = [];
    while ($row = $result->fetch_assoc()) {
        $autores[] = $row['nome_autor'];
    }

    // Remova duplicatas e imprima os autores
    $autores = array_unique($autores);
    $autores_str = implode(", ", $autores);

    ?>
    <div class="content">
        <h1 id="<?= htmlspecialchars($livro['id_livro']); ?>"><?= htmlspecialchars($livro['titulo']); ?></h1>
        <p>Ano de publicação: <?= htmlspecialchars($livro['ano_publicacao']); ?></p><br>
        <p>ISBN: <?= htmlspecialchars($livro['isbn']); ?></p><br>
        <p>Número de páginas: <?= htmlspecialchars($livro['numero_paginas']); ?></p><br>
        <p>Gênero: <?= htmlspecialchars($livro['genero']); ?></p><br>
        <p>Editora: <?= htmlspecialchars($livro['nome_editora']); ?></p><br>
        <p>Idioma: <?= htmlspecialchars($livro['idioma']); ?></p><br>
        <p>Autor(es): <?= htmlspecialchars($autores_str); ?></p><br>
        <p>Sinopse: </p>
        <p><?= htmlspecialchars($livro['sinopse']); ?></p><br>
    </div>
    <?php
} else {
    echo "Nenhum resultado encontrado.";
}

require_once('../components/footer.php');
?>
