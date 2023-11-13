<?php
require_once('../components/head.php');
?>

<div class="content">
    <form action="../importar/criar_autor.php" method="POST">
        <label for="nome_autor">Nome</label>
        <input type="text" placeholder="Informe o nome do autor" id="nome_autor" name="nome_autor">

        <label for="nacionalidade_autor">Nacionalidade</label>
        <input type="text" placeholder="Informe a nacionalidade" id="nacionalidade_autor" name="nacionalidade_autor">

        <label for="data_nascimento_autor">Data de nascimento</label>
        <input type="date" id="data_nascimento_autor" name="data_nascimento_autor">

        <button type="submit" value="salvar">Cadastrar</button>
    </form>


    <a href="../telas_ver/ver_autor.php">Ver autores</a>
</div>

<?php
require_once('../components/footer.php');
?>