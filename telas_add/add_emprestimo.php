<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$op_livro = [];
$result = $conn->query("SELECT id_livro, titulo FROM livro;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $op_livro[] = $row;
    }
}

$op_leitor = [];
$result = $conn->query("SELECT id_leitor, nome FROM leitor;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $op_leitor[] = $row;
    }
}

$op_status = [];
$result = $conn->query("SELECT * FROM status;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $op_status[] = $row;
    }
}
?>

<div class="content">
    
    <form action="../importar/criar_emprestimo.php" method="POST">
    <div class="titulo">
        <h1>Criar Emprestimo</h1>
        <a href="../telas_ver/ver_emprestimo.php"><i class="fa-solid fa-eye"></i></a>
    </div>
        <div class="form-group">
            <label for="data_emprestimo">Data emprestimo</label>
            <input type="date" id="data_emprestimo" name="data_emprestimo">
        </div>
        <div class="form-group">
            <label for="data_devolucao">Data devolucao</label>
            <input type="date" id="data_devolucao" name="data_devolucao">
        </div>
        <div class="form-group">
            <label for="emprestimo_id_livro">Livro</label>
            <select name="emprestimo_id_livro" id="emprestimo_id_livro">
                <?php foreach ($op_livro as $op_livro) : ?>
                    <option value="<?= htmlspecialchars($op_livro['id_livro']); ?>"><?= htmlspecialchars($op_livro['titulo']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="emprestimo_id_leitor">Leitor</label>
            <select name="emprestimo_id_leitor" id="emprestimo_id_leitor">
                <?php foreach ($op_leitor as $op_leitor) : ?>
                    <option value="<?= htmlspecialchars($op_leitor['id_leitor']); ?>"><?= htmlspecialchars($op_leitor['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="emprestimo_id_status">Status</label>
            <select name="emprestimo_id_status" id="emprestimo_id_status">
                <?php foreach ($op_status as $op_status) : ?>
                    <option value="<?= htmlspecialchars($op_status['id_status']); ?>"><?= htmlspecialchars($op_status['status']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
       

        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">