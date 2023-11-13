<?php
require_once('../components/head.php');
?>

<div class="content">
    <form action="../importar/criar_editora.php" method="POST">
        <label for="nome_editora">Nome</label>
        <input type="text" placeholder="Informe o nome da editora" id="nome_editora" name="nome_editora">

        <label for="localizacao_editora">localizacao</label>
        <input type="text" placeholder="Informe a localizacao" id="localizacao_editora" name="localizacao_editora">

        <button type="submit" value="salvar">Cadastrar</button>
    </form>


    <a href="../telas_ver/ver_editora.php">Ver editora</a>
</div>

<?php
require_once('../components/footer.php');
?>