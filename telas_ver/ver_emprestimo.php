<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$result = $conn->query("SELECT
e.id_emprestimo,
e.data_emprestimo,
e.data_devolucao,
e.emprestimo_id_livro,
l.titulo AS nome_livro,
e.emprestimo_id_leitor,
le.nome AS nome_leitor,
e.emprestimo_id_status,
s.status
FROM
emprestimo e
JOIN livro l ON e.emprestimo_id_livro = l.id_livro
JOIN leitor le ON e.emprestimo_id_leitor = le.id_leitor
JOIN status s ON e.emprestimo_id_status = s.id_status;
;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Emprestimo</h1>

    <a href="../telas_add/add_emprestimo.php">+ Adicionar emprestimo</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>data_emprestimo</th>
                <th>data_devolucao</th>
                <th>emprestimo_id_livro</th>
                <th>Nome do livro</th>
                <th>emprestimo_id_leitor</th>
                <th>Nome do leitor</th>
                <th>emprestimo_id_status</th>
                <th>status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($lista as $emprestimo) : ?>
            <tr>
                <td> <?= htmlspecialchars($emprestimo['id_emprestimo']); ?> </td>
                <td> <?= htmlspecialchars($emprestimo['data_emprestimo']); ?> </td>
                <td> <?= htmlspecialchars($emprestimo['data_devolucao']); ?> </td>

                <td> <?= htmlspecialchars($emprestimo['emprestimo_id_livro']); ?> </td>
                <td> <?= htmlspecialchars($emprestimo['nome_livro']); ?> </td>

                <td> <?= htmlspecialchars($emprestimo['emprestimo_id_leitor']); ?> </td>
                <td> <?= htmlspecialchars($emprestimo['nome_leitor']); ?> </td>

                <td> <?= htmlspecialchars($emprestimo['emprestimo_id_status']); ?> </td>
                <td> <?= htmlspecialchars($emprestimo['status']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_emprestimo.php?id=<?= $emprestimo['id_emprestimo']; ?>">
                        <button type="button" class="btn btn-secondary">
                            Editar
                        </button>
                    </a>
                    <a href="../importar/excluir_emprestimo.php?id=<?= $emprestimo['id_emprestimo']; ?>">
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