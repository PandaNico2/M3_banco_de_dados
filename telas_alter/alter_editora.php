<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM editora WHERE id_editora = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $editora = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_editora.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_editora.php');
    exit;
}
?>

<div class="content">

    <form action="/m3_banco_de_dados/importar/editar/editar_editora.php" method="POST">
        <div class="titulo">
        <a href="/m3_banco_de_dados/telas_ver/ver_editora.php"><i class="fa-solid fa-arrow-left"></i></a>
            <h1>Editar editora</h1>
        </div>
        <input type="hidden" value="<?= $editora['id_editora']; ?>" name="id_editora">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?= $editora['nome']; ?>" name="nome">
        </div>

        <div class="form-group">
            <label for="localizacao">localizacao</label>
            <input type="text" value="<?= $editora['localizacao']; ?>" name="localizacao">
        </div>

        <button type="submit" value="salvar" class="btn btn-secondary">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">