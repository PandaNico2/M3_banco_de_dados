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

    <h1>Editar usuário</h1>
    <form action="../importar/editar_editora.php" method="POST">
        <input type="hidden" value="<?= $editora['id_editora']; ?>"  name="id_editora" >
        <label for="nome">Nome</label>
        <input type="text" value="<?= $editora['nome']; ?>" name="nome">

        <label for="localizacao">localizacao</label>
        <input type="text" value="<?= $editora['localizacao']; ?>" name="localizacao">

        <button type="submit" value="salvar">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>