<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$result = $conn->query("SELECT * FROM palavra_chave;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Palavra Chave</h1>

    <a href="../telas_add/add_palavraChave.php">
    <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Adicionar Palavra Chave</button>
    </a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>palavra</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($lista as $palavraChave) : ?>
            <tr>
                <td> <?= htmlspecialchars($palavraChave['id_palavra_chave']); ?> </td>
                <td> <?= htmlspecialchars($palavraChave['palavra']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_palavraChave.php?id=<?= $palavraChave['id_palavra_chave']; ?>">
                        <button type="button" class="btn btn-secondary">
                            Editar
                        </button>
                    </a>
                    <a href="/m3_banco_de_dados/importar/excluir/excluir_palavraChave.php?id=<?= $palavraChave['id_palavra_chave']; ?>">
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