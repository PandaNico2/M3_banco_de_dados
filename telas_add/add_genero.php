<?php
require_once('../components/head.php');
?>

<div class="content">
    <form action="/m3_banco_de_dados/importar/criar/criar_genero.php" method="POST">
        <div class="titulo">
            <h1>Criar Genero</h1>
            <a href="../telas_ver/ver_genero.php"><i class="fa-solid fa-eye"></i></a>
        </div>
        <div class="form-group">
            <label for="genero">Genero</label>
            <input type="genero" placeholder="Informe o genero" id="genero" name="genero">
        </div>
        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<link rel="stylesheet" href="../css/add.css">
<?php
require_once('../components/footer.php');
?>