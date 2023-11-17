<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$query = "SELECT l.id_livro, l.titulo, l.ano_publicacao, l.isbn, l.numero_paginas, l.sinopse, 
                 l.livro_id_genero, g.genero, l.livro_id_editora, ed.nome AS nome_editora, 
                 l.livro_id_idioma, i.nome AS idioma, al.id_autor_livro, a.nome AS nome_autor
          FROM livro l
          JOIN genero g ON l.livro_id_genero = g.id_genero
          JOIN editora ed ON l.livro_id_editora = ed.id_editora
          JOIN idioma i ON l.livro_id_idioma = i.id_idioma
          JOIN autor_livro al ON l.id_livro = al.id_livro_autor
          JOIN autores a ON al.id_autor_livro = a.id_autores";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Livro</h1>

    <a href="../telas_add/add_livro_autor.php">+ Adicionar livro</a>


    <div class="box" id="lista-livro">
        <?php $count = 0; ?>
        <?php foreach ($lista as $livro) : ?>
            <div class="livro" id="<?= htmlspecialchars($livro['id_livro']); ?>">
                <a href="../importar/excluir_livro.php?id=<?= $livro['id_livro']; ?>">
                    <button type="button" class="btn btn-danger">Excluir</button>
                </a>
                <a href="../telas_alter/alter_livro.php?id=<?= $livro['id_livro']; ?>">
                    <button type="button" class="btn btn-secondary">Editar</button>
                </a>

                <p id="<?= htmlspecialchars($livro['id_autor_livro']); ?>"><?= htmlspecialchars($livro['nome_autor']); ?></p>
                <h3><?= htmlspecialchars($livro['titulo']); ?></h3>
                <div class="info_livro">
                    <p><?= htmlspecialchars($livro['ano_publicacao']); ?></p>
                    <p id="<?= htmlspecialchars($livro['livro_id_editora']); ?>"><?= htmlspecialchars($livro['nome_editora']); ?></p>
                </div>

                <a href="../importar/detalhes_livro.php?id=<?= $livro['id_livro']; ?>">
                    <button type="button" class="btn btn-info">Ver mais</button>
                </a>
            </div>
            <?php
            $count++;
            if ($count % 4 === 0) {
                echo '</div><div class="box" id="lista-livro">';
            }
            ?>
        <?php endforeach; ?>
    </div>

    <!-- 
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>id_livro</th>
                <th>titulo</th>
                <th>ano_publicacao</th>
                <th>isbn</th>
                <th>numero_paginas</th>
                <th>sinopse</th>
                <th>livro_id_genero</th>
                <th>genero</th>
                <th>livro_id_editora</th>
                <th>nome_editora</th>
                <th>livro_id_idioma</th>
                <th>idioma</th>
                <th>autor_livro</th>
                <th>nome_autor</th>
            </tr>
        </thead>
        <?php foreach ($lista as $livro) : ?>
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> <?= htmlspecialchars($livro['isbn']); ?> </td>
                <td> <?= htmlspecialchars($livro['numero_paginas']); ?> </td>
                <td> <?= htmlspecialchars($livro['sinopse']); ?> </td>

                <td> <?= htmlspecialchars($livro['livro_id_genero']); ?> </td>
                <td> <?= htmlspecialchars($livro['genero']); ?> </td>

                <td> </td>
                <td> </td>

                <td> <?= htmlspecialchars($livro['livro_id_idioma']); ?> </td>
                <td> <?= htmlspecialchars($livro['idioma']); ?> </td>

                <td> </td>
                <td> </td>
                <td>
                    <a href="../telas_alter/alter_livro.php?id=<?= $livro['id_livro']; ?>">
                        <button type="button" class="btn btn-secondary">Editar</button>
                    </a>
                    <a href="../importar/excluir_livro.php?id=<?= $livro['id_livro']; ?>">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table> -->
</div>

<?php
require_once('../components/footer.php');
?>