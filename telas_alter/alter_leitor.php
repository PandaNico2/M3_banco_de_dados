<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM leitor WHERE id_leitor = ?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $leitor = $result->fetch_assoc();
    } else {
        header('Location: ../telas_ver/ver_leitor.php');
        exit;
    }
} else {
    header('Location: ../telas_ver/ver_leitor.php');
    exit;
}
?>

<div class="content">

    <form action="/m3_banco_de_dados/importar/editar/editar_leitor.php" method="POST">
    <div class="titulo">
            <a href="/m3_banco_de_dados/telas_ver/ver_leitor.php"><i class="fa-solid fa-arrow-left"></i></a>
            <h1>Editar leitor</h1>
    </div>
            <input type="hidden" value="<?= $leitor['id_leitor']; ?>" name="id_leitor">
        <div class="form-group">
            <label for="nome">nome</label>
            <input type="text" value="<?= $leitor['nome']; ?>" name="nome">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" value="<?= $leitor['email']; ?>" name="email">
        </div>
        <div class="form-group">
            <label for="data_nascimento">data_nascimento</label>
            <input type="date" value="<?= $leitor['data_nascimento']; ?>" name="data_nascimento">
        </div>
        <div class="form-group">
            <label for="endereco">endereco</label>
            <input type="text" value="<?= $leitor['endereco']; ?>" name="endereco">
        </div>

        <button type="submit" value="salvar" class="btn btn-secondary">Atualizar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">