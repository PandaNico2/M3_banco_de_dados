<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$result = $conn->query("SELECT * FROM classificacao;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">

    <a href="../telas_add/add_classificacao.php">+ Adicionar classificacao</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>num_estrelas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($lista as $classificacao) : ?>
            <tr>
                <td> <?= htmlspecialchars($classificacao['id_classificacao']); ?> </td>
                <td> <?= htmlspecialchars($classificacao['num_estrelas']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_classificacao.php?id=<?= $classificacao['id_classificacao']; ?>">
                        <button type="button" class="btn btn-secondary">
                            Editar
                        </button>
                    </a>
                    <a href="../importar/excluir_classificacao.php?id=<?= $classificacao['id_classificacao']; ?>">
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