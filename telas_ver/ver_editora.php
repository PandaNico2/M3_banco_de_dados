<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$result = $conn->query("SELECT * FROM editora;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Editora</h1>

    <a href="../telas_add/add_editora.php">+ Adicionar editora</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Localização</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($lista as $editora) : ?>
            <tr>
                <td> <?= htmlspecialchars($editora['id_editora']); ?> </td>
                <td> <?= htmlspecialchars($editora['nome']); ?> </td>
                <td> <?= htmlspecialchars($editora['localizacao']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_editora.php?id=<?= $editora['id_editora']; ?>">
                        <button type="button" class="btn btn-secondary">
                            Editar
                        </button>
                    </a>
                    <a href="../importar/excluir_editora.php?id=<?= $editora['id_editora']; ?>">
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