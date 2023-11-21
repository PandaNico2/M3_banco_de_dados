<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

// Importar tabelas de gêneros, editoras e idiomas
$op_livros = importarTabela($conn, "SELECT id_livro, titulo FROM livro;");
$op_autores = importarTabela($conn, "SELECT id_autores, nome FROM autores;");

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
    <form action="/m3_banco_de_dados/importar/criar/criar_autor_livro.php" method="POST">
        <div class="titulo">
            <h1>Cadastrar Livro Autor</h1>
            <a href="../telas_ver/ver_autor_livro.php"><i class="fa-solid fa-eye"></i></a>
        </div>

        <div class="form-group">
            <label for="id_autor_livro">id_autor_livro</label>
            <select name="id_autor_livro" id="id_autor_livro">
                <option value="" selected disabled>Selecione o autor</option>
                <?php foreach ($op_autores as $op_autor) : ?>
                    <option value="<?= htmlspecialchars($op_autor['id_autores']); ?>"><?= htmlspecialchars($op_autor['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_livro_autor">id_livro_autor</label>
            <select name="id_livro_autor" id="id_livro_autor">
                <option value="" selected disabled>Selecione um livro</option>
                <?php foreach ($op_livros as $op_livro) : ?>
                    <option value="<?= htmlspecialchars($op_livro['id_livro']); ?>"><?= htmlspecialchars($op_livro['titulo']); ?></option>
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
