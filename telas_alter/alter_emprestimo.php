<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM emprestimo WHERE id_emprestimo = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $emprestimo = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_emprestimo.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_emprestimo.php');
    exit;
}

// importar tabelas
$livros = [];
$resultLivros = $conn->query("SELECT id_livro, titulo FROM livro;");
if ($resultLivros->num_rows > 0) {
    while ($row = $resultLivros->fetch_assoc()) {
        $livros[] = $row;
    }
}

$leitores = [];
$resultLeitor = $conn->query("SELECT id_leitor, nome FROM leitor;");
if ($resultLeitor->num_rows > 0) {
    while ($row = $resultLeitor->fetch_assoc()) {
        $leitores[] = $row;
    }
}

$Status = [];
$resulStatus = $conn->query("SELECT * FROM status;");
if ($resulStatus->num_rows > 0) {
    while ($row = $resulStatus->fetch_assoc()) {
        $Status[] = $row;
    }
}
?>

<div class="content">

    <form action="/m3_banco_de_dados/importar/editar/editar_emprestimo.php" method="POST">
        <div class="titulo">
            <a href="/m3_banco_de_dados/telas_ver/ver_emprestimo.php"><i class="fa-solid fa-arrow-left"></i></a>
            <h1>Editar emprestimo</h1>
        </div>
        <input type="hidden" value="<?= $emprestimo['id_emprestimo']; ?>" name="id_emprestimo">

        <div class="form-group">
            <label for="data_emprestimo">data_emprestimo</label>
            <input type="date" value="<?= $emprestimo['data_emprestimo']; ?>" name="data_emprestimo">
        </div>

        <div class="form-group">
            <label for="data_devolucao">data_devolucao</label>
            <input type="date" value="<?= $emprestimo['data_devolucao']; ?>" name="data_devolucao">
        </div>

        <div class="form-group">
            <label for="emprestimo_id_livro">Livro</label>
            <select name="emprestimo_id_livro" id="emprestimo_id_livro">
                <?php foreach ($livros as $livro) : ?>
                    <option value="<?= $livro['id_livro']; ?>" <?= ($emprestimo['emprestimo_id_livro'] == $livro['id_livro']) ? 'selected' : ''; ?>>
                        <?= $livro['titulo']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="emprestimo_id_leitor">Leitor</label>
            <select name="emprestimo_id_leitor" id="emprestimo_id_leitor">
                <?php foreach ($leitores as $leitor) : ?>
                    <option value="<?= $leitor['id_leitor']; ?>" <?= ($emprestimo['emprestimo_id_leitor'] == $leitor['id_leitor']) ? 'selected' : ''; ?>>
                        <?= $leitor['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="emprestimo_id_status">Status</label>
            <select name="emprestimo_id_status" id="emprestimo_id_status">
                <?php foreach ($Status as $status_op) : ?>
                    <option value="<?= $status_op['id_status']; ?>" <?= ($emprestimo['emprestimo_id_status'] == $status_op['id_status']) ? 'selected' : ''; ?>>
                        <?= $status_op['status']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" value="salvar" class="btn btn-secondary">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">