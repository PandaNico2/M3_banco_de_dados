<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM status WHERE id_status = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $status = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_status.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_status.php');
    exit;
}
?>

<div class="content">

    <h1>Editar usuário</h1>
    <form action="../importar/editar_status.php" method="POST">
        <input type="hidden" value="<?= $status['id_status']; ?>"  name="id_status" >
        <label for="status">Status</label>
        <input type="text" value="<?= $status['status']; ?>" name="status">

        <button type="submit" value="salvar">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>