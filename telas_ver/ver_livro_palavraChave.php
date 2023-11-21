<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$itens_por_pagina = 7; // Defina o número de itens por página
$lista = [];
$result_total = $conn->query("SELECT COUNT(*) as total FROM livro_palavrachave;"); // Obtenha o total de registros
$total_registros = $result_total->fetch_assoc()['total'];
$total_paginas = ceil($total_registros / $itens_por_pagina); // Calcule o número total de páginas

// Obtenha o número da página atual a partir da URL, padrão para 1 se não estiver definido
$pagina_atual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$inicio = ($pagina_atual - 1) * $itens_por_pagina;

// echo "Pagina Atual: $pagina_atual<br>";
// echo "Inicio: $inicio<br>";
// echo "Tptal de paginas: $result_total";

$result = $conn->query("SELECT
    lp.id_livro_palavraChave,
    l.titulo,
    lp.id_palavraChave_livro,
    pc.palavra
FROM
    livro_palavrachave lp
JOIN
    livro l ON lp.id_livro_palavraChave = l.id_livro
JOIN
    palavra_chave pc ON lp.id_palavraChave_livro = pc.id_palavra_chave
LIMIT $inicio, $itens_por_pagina;");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Livro - Palavra chave</h1>
    <a href="../telas_add/add_livro_palavraChave.php">
        <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Adicionar livro_palavraChave</button>
    </a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id livro</th>
                <th>Titulo</th>
                <th>Id palavra chave</th>
                <th>Palavra Chave</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($lista as $livro_palavraChave) : ?>
            <tr>
                <td><?= htmlspecialchars($livro_palavraChave['id_livro_palavraChave']); ?></td>
                <td><?= htmlspecialchars($livro_palavraChave['titulo']); ?></td>

                <td><?= htmlspecialchars($livro_palavraChave['id_palavraChave_livro']); ?></td>
                <td><?= htmlspecialchars($livro_palavraChave['palavra']); ?></td>
                <td>
                    <a href="../telas_alter/alter_livro_palavraChave.php?id_livro=<?= $livro_palavraChave['id_livro_palavraChave']; ?>&id_palavra=<?= $livro_palavraChave['id_palavraChave_livro']; ?>">
                        <button type="button" class="btn btn-secondary">Editar</button>
                    </a>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Adicione os links de navegação para páginas -->
    <!-- Adicione os links de navegação para páginas -->
    <?php if ($total_paginas > 1) : ?>
        <nav class="paginacao" aria-label="Navegação de página">
            <ul class="pagination">
                <li class="page-item <?= ($pagina_atual == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?pagina=<?= ($pagina_atual - 1); ?>" aria-label="Anterior">
                        <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                    </a>
                </li>

                <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                    <li class="page-item <?= ($i == $pagina_atual) ? 'active' : ''; ?>">
                        <a class="page-link" href="?pagina=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Link para a próxima página -->
                <li class="page-item <?= ($pagina_atual == $total_paginas) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?pagina=<?= ($pagina_atual + 1); ?>" aria-label="Próxima">
                        <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>

</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/livro_palavrachave.css">