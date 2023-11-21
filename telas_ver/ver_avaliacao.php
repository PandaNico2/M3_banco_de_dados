<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$itens_por_pagina = 7; // Defina o número de itens por página
$lista = [];

// Consulta SQL para obter o total de registros
$result_total = $conn->query("SELECT COUNT(*) as total FROM avaliacao;");
$total_registros = $result_total->fetch_assoc()['total'];
$total_paginas = ceil($total_registros / $itens_por_pagina);

$pagina_atual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$inicio = ($pagina_atual - 1) * $itens_por_pagina;

// echo "Pagina Atual: $pagina_atual<br>";
// echo "Inicio: $inicio<br>";
// echo "Registros: $total_registros<br>";
// echo "Pagina: $itens_por_pagina<br>";
// echo "Tptal de paginas: $total_paginas<br>";


// Consulta SQL para obter os registros da página atual
$result = $conn->query("SELECT
    a.id_avaliacao,
    a.comentario,
    a.data_comentario,
    a.avaliacao_id_livro,
    l.titulo AS nome_do_livro,
    a.avaliacao_id_leitor,
    le.nome AS nome_do_leitor,
    a.avaliacao_id_classificacao,
    c.num_estrelas
FROM
    avaliacao a
JOIN
    livro l ON a.avaliacao_id_livro = l.id_livro
JOIN
    leitor le ON a.avaliacao_id_leitor = le.id_leitor
JOIN
    classificacao c ON a.avaliacao_id_classificacao = c.id_classificacao
LIMIT $inicio, $itens_por_pagina;");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Avaliação</h1>

    <a href="../telas_add/add_avaliacao.php">
        <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Adicionar Avaliação</button>
    </a>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>id_avaliacao</th>
                <th>comentario</th>
                <th>data_comentario</th>
                <!-- <th>avaliacao_id_livro</th> -->
                <th>Nome do livro</th>
                <!-- <th>avaliacao_id_leitor</th> -->
                <th>Nome do leitor</th>
                <!-- <th>avaliacao_id_classificacao</th> -->
                <th>classificacao</th>
                <th>ação</th>
            </tr>
        </thead>
        <?php foreach ($lista as $avaliacao) : ?>
            <tr>
                <td> <?= htmlspecialchars($avaliacao['id_avaliacao']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['comentario']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['data_comentario']); ?> </td>
                <!-- <td> <?= htmlspecialchars($avaliacao['avaliacao_id_livro']); ?> </td> -->
                <td> <?= htmlspecialchars($avaliacao['nome_do_livro']); ?> </td>
                <!-- <td> <?= htmlspecialchars($avaliacao['avaliacao_id_leitor']); ?> </td> -->
                <td> <?= htmlspecialchars($avaliacao['nome_do_leitor']); ?> </td>
                <!-- <td> <?= htmlspecialchars($avaliacao['avaliacao_id_classificacao']); ?> </td> -->
                <td>
                    <?php for ($i = 0; $i < $avaliacao['num_estrelas']; $i++) {
                        echo '<i class="fas fa-star"></i> ';
                    } ?>
                </td>
                <td>
                    <a href="../telas_alter/alter_avaliacao.php?id=<?= $avaliacao['id_avaliacao']; ?>">
                        <button type="button" class="btn btn-secondary">Editar</button>
                    </a>
                    <a href="/m3_banco_de_dados/importar/excluir/excluir_avaliacao.php?id=<?= $avaliacao['id_avaliacao']; ?>">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

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
