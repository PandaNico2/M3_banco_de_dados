<?php
require_once('../components/head.php');
?>

<div class="content">
    
    <form action="../importar/criar_palavraChave.php" method="POST">
    <div class="titulo">
        <h1>Criar Palavra Chave</h1>
        <a href="../telas_ver/ver_palavraChave.php"><i class="fa-solid fa-eye"></i></a>
    </div>
        <div class="form-group">
            <label for="palavra">Palavra Chave</label>
            <input type="text" placeholder="Informe a palavra chave" id="palavra" name="palavra">
        </div>
        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">