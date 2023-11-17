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

    <h1>Editar usuário</h1>
    <form action="../importar/editar_genero.php" method="POST">
        <input type="hidden" value="<?= $genero['id_genero']; ?>"  name="id_genero" >
        <label for="genero">Genero</label>
        <input type="text" value="<?= $genero['genero']; ?>" name="genero">

        <button type="submit" value="salvar">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>