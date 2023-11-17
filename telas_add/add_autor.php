<?php
require_once('../components/head.php');
?>


<div class="content">    
    <form action="/m3_banco_de_dados/importar/criar/criar_autor.php" method="POST">
    <div class="titulo">
        <h1>Criar Autor</h1>
        <a href="../telas_ver/ver_autor.php"><i class="fa-solid fa-eye"></i></a>
    </div>
        <div class="form-group">
            <label for="nome_autor">Nome</label>
            <input type="text" placeholder="Informe o nome do autor" id="nome_autor" name="nome_autor">
        </div>
        <div class="form-group">
            <label for="nacionalidade_autor">Nacionalidade</label>
            <input type="text" placeholder="Informe a nacionalidade" id="nacionalidade_autor" name="nacionalidade_autor">
        </div>
        <div class="form-group">
            <label for="data_nascimento_autor">Data de nascimento</label>
            <input type="date" id="data_nascimento_autor" name="data_nascimento_autor">
        </div>
        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>

</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">