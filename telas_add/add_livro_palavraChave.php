<?php
require_once('../components/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

// Importar tabelas de gêneros, editoras e idiomas
$op_livros = importarTabela($conn, "SELECT id_livro, titulo FROM livro;");
$op_palavras = importarTabela($conn, "SELECT * FROM palavra_chave;");

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
    <form action="/m3_banco_de_dados/importar/criar/criar_livro_palavraChave.php" method="POST">
        <div class="titulo">
            <h1>Cadastrar Livro Palavra-chave</h1>
            <a href="../telas_ver/ver_livro_palavraChave.php"><i class="fa-solid fa-eye"></i> Visualizar</a>
        </div>

        <div class="form-group">
            <label for="id_livro_palavraChave">ID do Livro Palavra-chave</label>
            <select name="id_livro_palavraChave" id="id_livro_palavraChave">
                <option value="" selected disabled>Selecione um livro</option>
                <?php foreach ($op_livros as $op_livro) : ?>
                    <option value="<?= htmlspecialchars($op_livro['id_livro']); ?>"><?= htmlspecialchars($op_livro['titulo']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_palavraChave_livro">ID da Palavra-chave do Livro</label>
            <select name="id_palavraChave_livro" id="id_palavraChave_livro">
                <option value="" selected disabled>Selecione uma palavra-chave</option>
                <?php foreach ($op_palavras as $op_palavra) : ?>
                    <option value="<?= htmlspecialchars($op_palavra['id_palavra_chave']); ?>"><?= htmlspecialchars($op_palavra['palavra']); ?></option>
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
