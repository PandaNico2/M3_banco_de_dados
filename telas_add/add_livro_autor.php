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


$op_autor = [];
$result = $conn->query("SELECT id_autores, nome FROM autores;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $op_autor[] = $row;
    }
}

$exibirSelecionarAutor = true; // Variável para controlar a exibição do bloco "Selecionar Autor"

if (isset($_POST['mostrarNovoAutor']) && $_POST['mostrarNovoAutor'] == 'true') {
    $exibirSelecionarAutor = false; // Se o botão "Novo autor" for clicado, não exibir o bloco "Selecionar Autor"
}
?>

<div class="content">
    <form action="../importar/criar_livro_autor.php" method="POST">
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
            <option value="" disabled selected>Selecione o genero</option>
                <?php foreach ($op_genero as $op_genero) : ?>
                    <option value="<?= htmlspecialchars($op_genero['id_genero']); ?>"><?= htmlspecialchars($op_genero['genero']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="livro_id_editora">livro_id_editora</label>
            <select name="livro_id_editora" id="livro_id_editora">
            <option value="" disabled selected>Selecione a editora</option>
                <?php foreach ($op_editora as $op_editora) : ?>
                    <option value="<?= htmlspecialchars($op_editora['id_editora']); ?>"><?= htmlspecialchars($op_editora['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="livro_id_idioma">livro_id_idioma</label>
            <select name="livro_id_idioma" id="livro_id_idioma">
                <option value="" disabled selected>Selecione um idioma</option>
                <?php foreach ($op_idioma as $op_idioma) : ?>
                    <option value="<?= htmlspecialchars($op_idioma['id_idioma']); ?>"><?= htmlspecialchars($op_idioma['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <hr>
    
            <div id="selecionar_autor">
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <select name="autor" id="autor">
                        <option value="" disabled selected>Selecione o autor</option>
                        <?php foreach ($op_autor as $op_autor) : ?>
                            <option value="<?= htmlspecialchars($op_autor['id_autores']); ?>"><?= htmlspecialchars($op_autor['nome']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        

<!--         
            <div id="criar_autor">
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
            </div> -->
     

        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>

</div>

<link rel="stylesheet" href="../css/add.css">
<?php
require_once('../components/footer.php');
?>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the sections
        var selecionarAutorSection = document.getElementById("selecionar_autor");
        var criarAutorSection = document.getElementById("criar_autor");

        // Get reference to the button
        var novoAutorButton = document.querySelector("#selecionar_autor button");

        // Add a click event listener to the button
        novoAutorButton.addEventListener("click", function() {
            // Toggle visibility of sections
            selecionarAutorSection.style.display = "none";
            criarAutorSection.style.display = "block";
        });
    });
</script>