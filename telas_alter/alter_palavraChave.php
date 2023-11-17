<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM palavra_chave WHERE id_palavra_chave = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $palavraChave = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_palavraChave.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_palavraChave.php');
    exit;
}
?>

<div class="content">

    <h1>Editar usuário</h1>
    <form action="../importar/editar_palavraChave.php" method="POST">
        <input type="hidden" value="<?= $palavraChave['id_palavra_chave']; ?>"  name="id_palavra_chave" >
        <label for="palavra">palavra</label>
        <input type="text" value="<?= $palavraChave['palavra']; ?>" name="palavra">

        <button type="submit" value="salvar">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>