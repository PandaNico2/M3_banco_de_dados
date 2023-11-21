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

    <form action="/m3_banco_de_dados/importar/editar/editar_status.php" method="POST">
    <div class="titulo">
            <a href="/m3_banco_de_dados/telas_ver/ver_status.php"><i class="fa-solid fa-arrow-left"></i></a>
        <h1>Editar status</h1>
    </div>
        <input type="hidden" value="<?= $status['id_status']; ?>"  name="id_status" >
        <div class="form-group">
        <label for="status">Status</label>
        <input type="text" value="<?= $status['status']; ?>" name="status">
        </div>

        <button type="submit" value="salvar" class="btn btn-secondary">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">