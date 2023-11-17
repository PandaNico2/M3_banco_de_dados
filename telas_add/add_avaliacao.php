<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$livros = [];
$result = $conn->query("SELECT id_livro, titulo FROM livro;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $livros[] = $row;
    }
}

$leitor = [];
$result = $conn->query("SELECT id_leitor, nome FROM leitor;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $leitor[] = $row;
    }
}

$classificacao = [];
$result = $conn->query("SELECT * FROM classificacao;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $classificacao[] = $row;
    }
}
?>

<div class="content">
    <form action="/m3_banco_de_dados/importar/criar/criar_avaliacao.php" method="POST">
        <div class="titulo">
            <h1>Criar Avaliacao</h1>
            <a href="../telas_ver/ver_avaliacao.php"><i class="fa-solid fa-address-card"></i></a>
        </div>

        <div class="form-group">
            <label for="comentario">Comentario</label>
            <input type="text" placeholder="comentario. . ." id="comentario" name="comentario">
        </div>
        <div class="form-group">
            <label for="data_comentario">Data do comentario</label>
            <input type="date" id="data_comentario" name="data_comentario">
        </div>
        <div class="form-group">
            <label for="avaliacao_id_leitor">Leitor</label>
            <select name="avaliacao_id_leitor" id="avaliacao_id_leitor">
                <?php foreach ($leitor as $leitor) : ?>
                    <option value="<?= htmlspecialchars($leitor['id_leitor']); ?>"><?= htmlspecialchars($leitor['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="avaliacao_id_livro">Livro</label>
            <select name="avaliacao_id_livro" id="avaliacao_id_livro">
                <?php foreach ($livros as $livro) : ?>
                    <option value="<?= htmlspecialchars($livro['id_livro']); ?>"><?= htmlspecialchars($livro['titulo']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="avaliacao_id_classificacao">Classificacao</label>
            <select name="avaliacao_id_classificacao" id="avaliacao_id_classificacao">
            <?php foreach ($classificacao as $classificacao) : ?>
                    <option value="<?= htmlspecialchars($classificacao['id_classificacao']); ?>"><?= htmlspecialchars($classificacao['num_estrelas']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<link rel="stylesheet" href="../css/add.css">
<?php
require_once('../components/footer.php');
?>
