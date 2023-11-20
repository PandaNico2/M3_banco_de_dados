<?php
include './components/head.php';
require_once('./conexao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$op_genero = [];
$result = $conn->query("SELECT * FROM genero;");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $op_genero[] = $row;
    }
}
?>

<div class="content">
    <form id="filtro" action="" method="GET">
        <div class="form-group">
            <input type="text" name="busca" placeholder="Pesquise um título ...">
        </div>
        <div class="form-group">
            <label for="livro_id_genero">Livro por Gênero</label>
            <select name="livro_id_genero" id="livro_id_genero">
                <option selected disabled value="">Busque por gênero</option>
                <?php foreach ($op_genero as $genero) : ?>
                    <option value="<?= htmlspecialchars($genero['id_genero']); ?>"><?= htmlspecialchars($genero['genero']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit">Pesquisar</button>
    </form>

    <div id="lista-livro" class="box">
        <?php
        if (isset($_GET['busca']) && !empty($_GET['busca']) || isset($_GET['livro_id_genero']) && !empty($_GET['livro_id_genero'])) {
            $pesquisa = $conn->real_escape_string($_GET['busca']);
            $generoSelecionado = isset($_GET['livro_id_genero']) ? $conn->real_escape_string($_GET['livro_id_genero']) : '';

            $sql_livro = "SELECT l.id_livro, l.titulo, l.ano_publicacao, l.isbn, l.numero_paginas, l.sinopse, 
                l.livro_id_genero, g.genero, l.livro_id_editora, ed.nome AS nome_editora, 
                l.livro_id_idioma, i.nome AS idioma, al.id_autor_livro, a.nome AS nome_autor
                FROM livro l
                JOIN genero g ON l.livro_id_genero = g.id_genero
                JOIN editora ed ON l.livro_id_editora = ed.id_editora
                JOIN idioma i ON l.livro_id_idioma = i.id_idioma
                JOIN autor_livro al ON l.id_livro = al.id_livro_autor
                JOIN autores a ON al.id_autor_livro = a.id_autores
                WHERE (titulo LIKE '%$pesquisa%')";

            if (!empty($generoSelecionado)) {
                $sql_livro .= " AND l.livro_id_genero = '$generoSelecionado'";
            }

            $sqlQuery = $conn->query($sql_livro) or die("ERRO ao consultar! " . $conn->error);

            if ($sqlQuery->num_rows == 0) {
                echo '<p>Nenhum resultado encontrado...</p>';
            } else {
                while ($dados =  $sqlQuery->fetch_assoc()) {
        ?>
                    <div class="livro" id="<?= htmlspecialchars($dados['id_livro']); ?>">
                        <!-- <div class="botoes_acao">
                            <a href="../importar/excluir/excluir_livro.php?id=<?= $dados['id_livro']; ?>">
                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                            </a>
                            <a href="../telas_alter/alter_livro.php?id=<?= $dados['id_livro']; ?>">
                                <button type="button" class="btn btn-secondary"><i class="fa-solid fa-pen"></i></button>
                            </a>
                        </div> -->

                        <p id="<?= htmlspecialchars($dados['id_autor_livro']); ?>"><?= htmlspecialchars($dados['nome_autor']); ?></p>
                        <h3><?= htmlspecialchars($dados['titulo']); ?></h3>
                        <div class="info_livro">
                            <p><?= htmlspecialchars($dados['ano_publicacao']); ?></p>
                            <p id="<?= htmlspecialchars($dados['livro_id_editora']); ?>"><?= htmlspecialchars($dados['nome_editora']); ?></p>
                        </div>

                        <a href="./telas_ver/detalhes_livro.php?id=<?= $dados['id_livro']; ?>">
                            <button type="button" class="btn btn-info"><i class="fa-solid fa-info"></i> ver mais informações</button>
                        </a>
                    </div>

        <?php
                }
            }
        } else {
            echo '<p>Digite algo para pesquisar...</p>';
        }
        ?>
    </div>
</div>

<?php
include './components/footer.php';
?>