<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM autores WHERE id_autores = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $autor = $result->fetch_assoc();
    } else {
        header('Location: C:\xampp\htdocs\m3_banco_de_dados\telas_ver\ver_autor.php');
        exit;
    }
} else {
    header('Location: C:\xampp\htdocs\m3_banco_de_dados\telas_ver\ver_autor.php');
    exit;
}
?>

<div class="content">

    <h1>Editar usuário</h1>
    <form action="../importar/editar_autor.php" method="POST">
        <input type="hidden" value="<?= $autor['id_autores']; ?>"  name="id_autores" >
        <label for="nome">Nome</label>
        <input type="text" value="<?= $autor['nome']; ?>" name="nome">

        <label for="nacionalidade">Nacionalidade</label>
        <input type="text" value="<?= $autor['nacionalidade']; ?>" name="nacionalidade">

        <label for="data_nascimento">Data de nascimento</label>
        <input type="date" value="<?= $autor['data_nascimento']; ?>" name="data_nascimento">

        <button type="submit" value="salvar">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>