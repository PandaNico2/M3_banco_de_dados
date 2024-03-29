<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$result = $conn->query("SELECT * FROM idioma;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Idioma</h1>

    <a href="../telas_add/add_idioma.php">
    <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Adicionar Idioma</button>
    </a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Idioma</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($lista as $idioma) : ?>
            <tr>
                <td> <?= htmlspecialchars($idioma['id_idioma']); ?> </td>
                <td> <?= htmlspecialchars($idioma['nome']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_idioma.php?id=<?= $idioma['id_idioma']; ?>">
                        <button type="button" class="btn btn-secondary">
                            Editar
                        </button>
                    </a>
                    <a href="/m3_banco_de_dados/importar/excluir/excluir_idioma.php?id=<?= $idioma['id_idioma']; ?>">
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