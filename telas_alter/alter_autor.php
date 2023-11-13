<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id_autores = filter_input(INPUT_GET, 'id');
if ($id_autores) {
    $sql = $conn->prepare("SELECT * FROM autores WHERE id_autores = ?");
    $sql->bind_param('s', $id_autores);
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

<h1>Editar usuário</h1>
<form action="./editar_autor.php" method="POST">
    <label for="nome_autor">Nome</label>
    <input type="text" value="<?= $autor['nome_autor']; ?>" name="nome">

    <label for="nacionalidade_autor">Nacionalidade</label>
    <input type="text" value="<?= $autor['nacionalidade_autor']; ?>" name="nacionalidade">

    <label for="data_nascimento_autor">Data de nascimento</label>
    <input type="date" value="<?= $autor['data_nascimento_autor']; ?>" name="data_nascimento">

    <button type="submit" value="salvar">Atualizar</button>
</form>



<?php
require_once('../components/footer.php');
?>