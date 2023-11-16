<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$result = $conn->query("SELECT * FROM genero;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Genero</h1>

    <a href="../telas_add/add_genero.php">+ Adicionar genero</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>genero</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($lista as $genero) : ?>
            <tr>
                <td> <?= htmlspecialchars($genero['id_genero']); ?> </td>
                <td> <?= htmlspecialchars($genero['genero']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_genero.php?id=<?= $genero['id_genero']; ?>">
                        <button type="button" class="btn btn-secondary">
                            Editar
                        </button>
                    </a>
                    <a href="../importar/excluir_genero.php?id=<?= $genero['id_genero']; ?>">
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