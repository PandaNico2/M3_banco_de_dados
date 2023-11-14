<?php
require_once('../components/head.php');
?>

<div class="content">
    
    <form action="../importar/criar_idioma.php" method="POST">
    <div class="titulo">
        <h1>Criar Idioma</h1>
        <a href="../telas_ver/ver_idioma.php"><i class="fa-solid fa-eye"></i></a>
    </div>
        <div class="form-group">
            <label for="nome">Idioma</label>
            <input type="text" placeholder="Informe o idioma" id="nome" name="nome">
        </div>
        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">