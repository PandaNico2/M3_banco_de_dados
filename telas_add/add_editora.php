<?php
require_once('../components/head.php');
?>

<div class="content">
    <form action="/m3_banco_de_dados/importar/criar/criar_editora.php" method="POST">
        <div class="titulo">
            <h1>Criar Editora</h1>
            <a href="../telas_ver/ver_editora.php"><i class="fa-solid fa-eye"></i></a>
        </div>
        <div class="form-group">
            <label for="nome_editora">Nome</label>
            <input type="text" placeholder="Informe o nome da editora" id="nome_editora" name="nome_editora">
        </div>
        <div class="form-group">
            <label for="localizacao_editora">localizacao</label>
            <input type="text" placeholder="Informe a localizacao" id="localizacao_editora" name="localizacao_editora">
        </div>
        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<link rel="stylesheet" href="../css/add.css">
<?php
require_once('../components/footer.php');
?>