<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
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
classificacao c ON a.avaliacao_id_classificacao = c.id_classificacao;
");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">

    <a href="../telas_add/add_avaliacao.php">+ Adicionar avaliacao</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>id_avaliacao</th>
                <th>comentario</th>
                <th>data_comentario</th>
                <th>avaliacao_id_livro</th>
                <th>Nome do livro</th>
                <th>avaliacao_id_leitor</th>
                <th>Nome do leitor</th>
                <th>avaliacao_id_classificacao</th>
                <th>classificacao</th>
                <th>ação</th>
            </tr>
        </thead>
        <?php foreach ($lista as $avaliacao) : ?>
            <tr>
                <td> <?= htmlspecialchars($avaliacao['id_avaliacao']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['comentario']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['data_comentario']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['avaliacao_id_livro']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['nome_do_livro']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['avaliacao_id_leitor']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['nome_do_leitor']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['avaliacao_id_classificacao']); ?> </td>
                <td> <?= htmlspecialchars($avaliacao['num_estrelas']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_avaliacao.php?id=<?= $avaliacao['id_avaliacao']; ?>">
                        <button type="button" class="btn btn-secondary">
                            Editar
                        </button>
                    </a>
                    <a href="../importar/excluir_avaliacao.php?id=<?= $avaliacao['id_avaliacao']; ?>">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php
require_once('../components/footer.php');
?>