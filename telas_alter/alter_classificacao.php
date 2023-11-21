<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM classificacao WHERE id_classificacao = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $classificacao = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_classificacao.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_classificacao.php');
    exit;
}
?>

<div class="content">
    <form action="/m3_banco_de_dados/importar/editar/editar_classificacao.php" method="POST">
        <div class="titulo">
            <a href="/m3_banco_de_dados/telas_ver/ver_classificacao.php"><i class="fa-solid fa-arrow-left"></i></a>
            <h1>Editar Classificação</h1>
        </div>
        <input type="hidden" value="<?= $classificacao['id_classificacao']; ?>" name="id_classificacao">
        <div class="form-group">
            <label for="num_estrelas">Numero de estrelas</label>
            <input type="text" value="<?= $classificacao['num_estrelas']; ?>" name="num_estrelas">
        </div>

        <button type="submit" value="salvar" class="btn btn-secondary">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">