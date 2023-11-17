<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM idioma WHERE id_idioma = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $idioma = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_idioma.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_idioma.php');
    exit;
}
?>

<div class="content">

    <h1>Editar usuário</h1>
    <form action="../importar/editar_idioma.php" method="POST">
        <input type="hidden" value="<?= $idioma['id_idioma']; ?>"  name="id_idioma" >
        <label for="nome">Nome</label>
        <input type="text" value="<?= $idioma['nome']; ?>" name="nome">

        <button type="submit" value="salvar">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>