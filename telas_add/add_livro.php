<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$op_genero = [];
$result = $conn->query("SELECT * FROM genero;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $op_genero[] = $row;
    }
}


$op_editora = [];
$result = $conn->query("SELECT * FROM editora;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $op_editora[] = $row;
    }
}

$op_idioma = [];
$result = $conn->query("SELECT * FROM idioma;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $op_idioma[] = $row;
    }
}

?>

<div class="content">
    <form action="../importar/criar_livro.php" method="POST">
        <div class="titulo">
            <h1>Criar Livro</h1>
            <a href="../telas_ver/ver_livro.php"><i class="fa-solid fa-eye"></i></a>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" placeholder="Informe o titulo" id="titulo" name="titulo">
        </div>
        <div class="form-group">
            <label for="ano_publicacao">Ano de publicacao</label>
            <input type="number" placeholder="Informe o ano" id="ano_publicacao" name="ano_publicacao">
        </div>
        <div class="form-group">
            <label for="isbn">ISBM</label>
            <input type="number" placeholder="Informe o isbn" id="isbn" name="isbn">
        </div>
        <div class="form-group">
            <label for="numero_paginas">Número de paginas</label>
            <input type="number" placeholder="Informe o número de paginas" id="numero_paginas" name="numero_paginas">
        </div>
        <div class="form-group">
            <label for="sinopse">Sinopse</label>
            <input type="text" placeholder="Informe a sinopse" id="sinopse" name="sinopse">
        </div>
        <div class="form-group">
            <label for="livro_id_genero">livro_id_genero</label>
            <select name="livro_id_genero" id="livro_id_genero">
                <?php foreach ($op_genero as $op_genero) : ?>
                    <option value="<?= htmlspecialchars($op_genero['id_genero']); ?>"><?= htmlspecialchars($op_genero['genero']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="livro_id_editora">livro_id_editora</label>
            <select name="livro_id_editora" id="livro_id_editora">
                <?php foreach ($op_editora as $op_editora) : ?>
                    <option value="<?= htmlspecialchars($op_editora['id_editora']); ?>"><?= htmlspecialchars($op_editora['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="livro_id_idioma">livro_id_idioma</label>
            <select name="livro_id_idioma" id="livro_id_idioma">
                <?php foreach ($op_idioma as $op_idioma) : ?>
                    <option value="<?= htmlspecialchars($op_idioma['id_idioma']); ?>"><?= htmlspecialchars($op_idioma['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>



        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<link rel="stylesheet" href="../css/add.css">
<?php
require_once('../components/footer.php');
?>