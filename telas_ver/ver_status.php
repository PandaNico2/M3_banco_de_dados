<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$result = $conn->query("SELECT * FROM status;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Status</h1>

    <a href="../telas_add/add_status.php">
    <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Adicionar Status</button>
    </a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($lista as $status) : ?>
            <tr>
                <td> <?= htmlspecialchars($status['id_status']); ?> </td>
                <td> <?= htmlspecialchars($status['status']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_status.php?id=<?= $status['id_status']; ?>">
                        <button type="button" class="btn btn-secondary">
                            Editar
                        </button>
                    </a>
                    <a href="/m3_banco_de_dados/importar/excluir/excluir_status.php?id=<?= $status['id_status']; ?>">
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