<?php
require_once('../components/head.php');
?>

<div class="content">
    
    <form action="../importar/criar_leitor.php" method="POST">
    <div class="titulo">
        <h1>Criar Leitor</h1>
        <a href="../telas_ver/ver_leitor.php"><i class="fa-solid fa-eye"></i></a>
    </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" placeholder="Informe o nome" id="nome" name="nome">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" placeholder="Informe o email" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de nascimento</label>
            <input type="date" id="data_nascimento" name="data_nascimento">
        </div>
        <div class="form-group">
            <label for="endereco">Endereco</label>
            <input type="text" placeholder="Informe o endereco" id="endereco" name="endereco">
        </div>
        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">