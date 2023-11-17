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

$op_palavra = [];
$result = $conn->query("SELECT * FROM palavra_chave;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $op_palavra[] = $row;
    }
}

$exibirSelecionarAutor = true; // Variável para controlar a exibição do bloco "Selecionar Autor"

if (isset($_POST['mostrarNovoAutor']) && $_POST['mostrarNovoAutor'] == 'true') {
    $exibirSelecionarAutor = false; // Se o botão "Novo autor" for clicado, não exibir o bloco "Selecionar Autor"
}


$exibirSelecionarPalavraChave = true; // Variável para controlar a exibição do bloco "Selecionar Autor"

if (isset($_POST['mostrarNovaPalavra']) && $_POST['mostrarNovaPalavra'] == 'true') {
    $exibirSelecionarPalavraChave = false; // Se o botão "Novo autor" for clicado, não exibir o bloco "Selecionar Autor"
}
?>

<div class="content">
    <form action="/m3_banco_de_dados/importar/criar/criar_livro_autor.php" method="POST">
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

        <!-- autor -->
        <button type="button" id="mostrarNovoAutorBtn" class="btn btn-secondary">Novo Autor</button>

        <div id="selecionar_autor" <?php echo $exibirSelecionarAutor ? '' : 'style="display: none;"'; ?>>
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



        <div id="criar_autor" <?php echo $exibirSelecionarAutor ? 'style="display: none;"' : ''; ?>>
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
        </div>

        <hr>

        <!-- palavra Chave -->
        <button type="button" id="mostrarNovaPalavraBtn" class="btn btn-secondary">Nova palavra chave</button>

        <div id="selecionar_palavraChave" <?php echo $exibirSelecionarPalavraChave ? '' : 'style="display: none;"'; ?>>
            <div class="form-group">
                <label for="palavra">Palavra chave</label>
                <select name="palavra" id="palavra">
                    <option value="" disabled selected>Selecione palavra chave</option>
                    <?php foreach ($op_palavra as $op_palavra) : ?>
                        <option value="<?= htmlspecialchars($op_palavra['id_palavra_chave']); ?>"><?= htmlspecialchars($op_palavra['palavra']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>



        <div id="criar_palavraChave" <?php echo $exibirSelecionarPalavraChave ? 'style="display: none;"' : ''; ?>>
            <div class="titulo">
                <h1>Criar palavra chave</h1>
                <a href="../telas_ver/ver_autor.php"><i class="fa-solid fa-eye"></i></a>
            </div>
            <div class="form-group">
                <label for="palavra">Palavra chave</label>
                <input type="text" placeholder="Informe a palavra" id="palavra" name="palavra">
            </div>
        </div>


        <button type="submit" value="salvar" class="btn btn-secondary">Cadastrar</button>
    </form>

</div>

<link rel="stylesheet" href="../css/add.css">
<?php
require_once('../components/footer.php');
?>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var mostrarNovoAutorBtn = document.getElementById("mostrarNovoAutorBtn");
        var selecionarAutorSection = document.getElementById("selecionar_autor");
        var criarAutorSection = document.getElementById("criar_autor");

        mostrarNovoAutorBtn.addEventListener("click", function() {
            selecionarAutorSection.style.display = "none";
            criarAutorSection.style.display = "block";
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var mostrarNovaPalavraBtn = document.getElementById("mostrarNovaPalavraBtn");
        var selecionarPalavraSection = document.getElementById("selecionar_palavraChave");
        var criarPalavraSection = document.getElementById("criar_palavraChave");

        mostrarNovaPalavraBtn.addEventListener("click", function() {
            selecionarPalavraSection.style.display = "none";
            criarPalavraSection.style.display = "block";
        });
    });
</script>