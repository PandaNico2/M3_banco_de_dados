<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM genero WHERE id_genero = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $genero = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_genero.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_genero.php');
    exit;
}
?>

<div class="content">

    <form action="/m3_banco_de_dados/importar/editar/editar_genero.php" method="POST">
        <div class="titulo">
            <a href="/m3_banco_de_dados/telas_ver/ver_genero.php"><i class="fa-solid fa-arrow-left"></i></a>
            <h1>Editar genero</h1>
        </div>
        <input type="hidden" value="<?= $genero['id_genero']; ?>" name="id_genero">
        <div class="form-group">
        <label for="genero">Genero</label>
        <input type="text" value="<?= $genero['genero']; ?>" name="genero">
        </div>

        <button type="submit" value="salvar" class="btn btn-secondary">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">