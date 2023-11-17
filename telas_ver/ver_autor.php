<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$lista = [];
$result = $conn->query("SELECT * FROM autores;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lista[] = $row;
    }
}
?>

<div class="content">
    <h1>Autor</h1>
    <a href="../telas_add/add_autor.php">
        <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Adicionar Autor</button>
    </a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Nacionalidade</th>
                <th>Data de nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($lista as $autor) : ?>
            <tr>
                <td> <?= htmlspecialchars($autor['id_autores']); ?> </td>
                <td> <?= htmlspecialchars($autor['nome']); ?> </td>
                <td> <?= htmlspecialchars($autor['nacionalidade']); ?> </td>
                <td> <?= htmlspecialchars($autor['data_nascimento']); ?> </td>
                <td>
                    <a href="../telas_alter/alter_autor.php?id=<?= $autor['id_autores']; ?>">
                        <button type="button" class="btn btn-secondary">

                            Editar
                        </button>
                    </a>
                    <a href="/m3_banco_de_dados/importar/excluir/excluir_autor.php?id=<?= $autor['id_autores']; ?>">
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