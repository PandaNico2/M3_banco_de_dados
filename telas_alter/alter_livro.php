<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

// Verificar se o ID foi fornecido e é um número inteiro válido
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: ../telas_ver/ver_livro.php');
    exit;
}

// Obter informações do livro
$sql = $conn->prepare("SELECT * FROM livro WHERE id_livro = ?");
$sql->bind_param('i', $id);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows === 0) {
    header('Location: ../telas_ver/ver_livro.php');
    exit;
}

$livro = $result->fetch_assoc();

// Importar tabelas de gêneros, editoras e idiomas
$generos = importarTabela($conn, "SELECT * FROM genero;");
$editoras = importarTabela($conn, "SELECT id_editora, nome FROM editora;");
$idiomas = importarTabela($conn, "SELECT * FROM idioma;");

function importarTabela($conexao, $sql)
{
    $tabela = [];
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tabela[] = $row;
        }
    }

    return $tabela;
}
?>

<div class="content">
    <form action="/m3_banco_de_dados/importar/editar/editar_livro.php" method="POST">
        <div class="titulo">
            <h1>Editar livro</h1>
            <a href="../telas_ver/ver_livro.php"><i class="fa-solid fa-address-card"></i></a>
        </div>

        <input type="hidden" value="<?= $livro['id_livro']; ?>" name="id_livro">

        <div class="form-group">
            <label for="titulo">titulo</label>
            <input type="text" value="<?= $livro['titulo']; ?>" name="titulo">
        </div>

        <div class="form-group">
            <label for="ano_publicacao">ano_publicacao</label>
            <input type="number" value="<?= $livro['ano_publicacao']; ?>" id="ano_publicacao" name="ano_publicacao">
        </div>

        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="number" value="<?= $livro['isbn']; ?>" id="isbn" name="isbn">
        </div>

        <div class="form-group">
            <label for="numero_paginas">Número paginas</label>
            <input type="number" value="<?= $livro['numero_paginas']; ?>" id="numero_paginas" name="numero_paginas">
        </div>

        <div class="form-group">
            <label for="sinopse">Sinopse</label>
            <input type="text" value="<?= $livro['sinopse']; ?>" name="sinopse">
        </div>


        <div class="form-group">
            <label for="livro_id_genero">Gênero</label>
            <select name="livro_id_genero" id="livro_id_genero">
                <?php foreach ($generos as $genero) : ?>
                    <option value="<?= $genero['id_genero']; ?>" <?= ($livro['livro_id_genero'] == $genero['id_genero']) ? 'selected' : ''; ?>>
                        <?= $genero['genero']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="livro_id_editora">Editora</label>
            <select name="livro_id_editora" id="livro_id_editora">
                <?php foreach ($editoras as $editora) : ?>
                    <option value="<?= $editora['id_editora']; ?>" <?= ($livro['livro_id_editora'] == $editora['id_editora']) ? 'selected' : ''; ?>>
                        <?= $editora['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="livro_id_idioma">Idioma</label>
            <select name="livro_id_idioma" id="livro_id_idioma">
                <?php foreach ($idiomas as $idioma) : ?>
                    <option value="<?= $idioma['id_idioma']; ?>" <?= ($livro['livro_id_idioma'] == $idioma['id_idioma']) ? 'selected' : ''; ?>>
                        <?= $idioma['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="livro_id_idioma">Idioma</label>
            <select name="livro_id_idioma" id="livro_id_idioma">
                <?php foreach ($idiomas as $idioma) : ?>
                    <option value="<?= $idioma['id_idioma']; ?>" <?= ($livro['livro_id_idioma'] == $idioma['id_idioma']) ? 'selected' : ''; ?>>
                        <?= $idioma['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" value="salvar" class="btn btn-secondary">Atualizar</button>
    </form>
</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="../css/add.css">