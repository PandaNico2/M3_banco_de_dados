<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $sql = $conn->prepare("SELECT * FROM avaliacao WHERE id_avaliacao = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $avaliacao = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_avaliacao.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_avaliacao.php');
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

$classificacoes = [];
$resultClassificacoes = $conn->query("SELECT * FROM classificacao;");
if ($resultClassificacoes->num_rows > 0) {
    while ($row = $resultClassificacoes->fetch_assoc()) {
        $classificacoes[] = $row;
    }
}
?>

<div class="content">
    <form action="/m3_banco_de_dados/importar/editar/editar_avaliacao.php" method="POST">
        <div class="titulo">
            <h1>Editar Avaliação</h1>
            <a href="../telas_ver/ver_avaliacao.php"><i class="fa-solid fa-address-card"></i></a>
        </div>

        <input type="hidden" value="<?= $avaliacao['id_avaliacao']; ?>" name="id_avaliacao">

        <div class="form-group">
            <label for="comentario">Comentário</label>
            <input type="text" value="<?= $avaliacao['comentario']; ?>" name="comentario">
        </div>

        <div class="form-group">
            <label for="data_comentario">Data do Comentário</label>
            <input type="date" value="<?= $avaliacao['data_comentario']; ?>" id="data_comentario" name="data_comentario">
        </div>

        <div class="form-group">
            <label for="avaliacao_id_livro">Livro</label>
            <select name="avaliacao_id_livro" id="avaliacao_id_livro">
                <?php foreach ($livros as $livro) : ?>
                    <option value="<?= $livro['id_livro']; ?>" <?= ($avaliacao['avaliacao_id_livro'] == $livro['id_livro']) ? 'selected' : ''; ?>>
                        <?= $livro['titulo']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="avaliacao_id_leitor">Leitor</label>
            <select name="avaliacao_id_leitor" id="avaliacao_id_leitor">
                <?php foreach ($leitores as $leitor) : ?>
                    <option value="<?= $leitor['id_leitor']; ?>" <?= ($avaliacao['avaliacao_id_leitor'] == $leitor['id_leitor']) ? 'selected' : ''; ?>>
                        <?= $leitor['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="avaliacao_id_classificacao">Classificação</label>
            <select name="avaliacao_id_classificacao" id="avaliacao_id_classificacao">
                <?php foreach ($classificacoes as $classificacao) : ?>
                    <option value="<?= $classificacao['id_classificacao']; ?>" <?= ($avaliacao['avaliacao_id_classificacao'] == $classificacao['id_classificacao']) ? 'selected' : ''; ?>>
                        <?= $classificacao['num_estrelas']; ?>
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