<?php
require_once('../components/head.php');
?>

<div class="content">
    <form action="/m3_banco_de_dados/importar/criar/criar_status.php" method="POST">
        <div class="titulo">
            <h1>Criar Status</h1>
            <a href="../telas_ver/ver_status.php"><i class="fa-solid fa-eye"></i></a>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" placeholder="Informe o status" id="status" name="status">
        </div>
        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<link rel="stylesheet" href="../css/add.css">
<?php
require_once('../components/footer.php');
?>