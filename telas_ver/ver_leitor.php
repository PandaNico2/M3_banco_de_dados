<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$result = $conn->query("SELECT * FROM leitor;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">

    <a href="../telas_add/add_leitor.php">+ Adicionar leitor</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>nome</th>
                <th>email</th>
                <th>data_nascimento</th>
                <th>endereco</th>
                <th>Ação</th>
            </tr>
        </thead>
        <?php foreach ($lista as $leitor) : ?>
            <tr>
                <td> <?= htmlspecialchars($leitor['id_leitor']); ?> </td>
                <td> <?= htmlspecialchars($leitor['nome']); ?> </td>
                <td> <?= htmlspecialchars($leitor['email']); ?> </td>
                <td> <?= htmlspecialchars($leitor['data_nascimento']); ?> </td>
                <td> <?= htmlspecialchars($leitor['endereco']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_leitor.php?id=<?= $leitor['id_leitor']; ?>">
                        <button type="button" class="btn btn-secondary">
                            Editar
                        </button>
                    </a>
                    <a href="../importar/excluir_leitor.php?id=<?= $leitor['id_leitor']; ?>">
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