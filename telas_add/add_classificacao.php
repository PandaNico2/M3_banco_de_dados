<?php
require_once('../components/head.php');
?>

<div class="content">
    <form action="/m3_banco_de_dados/importar/criar/criar_classificacao.php" method="POST">
        <div class="titulo">
            <h1>Criar Classificação</h1>
            <a href="../telas_ver/ver_classificacao.php"><i class="fa-solid fa-eye"></i></a>
        </div>
        <div class="form-group">
            <label for="num_estrelas">Número de estrelas</label>
            <input type="number" placeholder="Informe o número" id="num_estrelas" name="num_estrelas">
        </div>
        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<link rel="stylesheet" href="../css/add.css">
<?php
require_once('../components/footer.php');
?>