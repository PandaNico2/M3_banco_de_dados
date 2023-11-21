<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM livro_palavraChave WHERE id_livro_palavraChave = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $livro_palavraChave = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_livro_palavraChave.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_livro_palavraChave.php');
    exit;
}
?>

<div class="content">

    <form action="/m3_banco_de_dados/importar/editar/editar_livro_palavraChave.php" method="POST">
        <div class="titulo">
            <a href="/m3_banco_de_dados/telas_ver/ver_livro_palavraChave.php"><i class="fa-solid fa-arrow-left"></i></a>
            <h1>Editar livro_palavraChave</h1>
        </div>
        <input type="hidden" value="<?= $livro_palavraChave['id_livro_palavraChave']; ?>" name="id_livro_palavraChave">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?= $livro_palavraChave['nome']; ?>" name="nome">
        </div>

        <button type="submit" value="salvar" class="btn btn-secondary">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">