<?php
include './components/head.php';
require_once('./conexao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');
?>

<div class="content">
    <form action="">
        <input type="text" name="busca" placeholder="Pesquise um titulo ...">
        <button>Pesquisar</button>

        
    </form>
    <table>
        <tr>
            <th>id livro</th>
            <th>titulo</th>
            <th>ano</th>
        </tr>
        <?php if (!isset($_GET['busca']) || empty($_GET['busca'])) { ?>
            <tr>
                <td>Digite algo para pesquisar...</td>
            </tr>
        <?php } else {
            $pesquisa = $conn->real_escape_string($_GET['busca']);

            $sql_livro = "SELECT *
            FROM livro
            where titulo LIKE '%$pesquisa%';";
            $sqlQuery = $conn->query($sql_livro) or die("ERRO ao consultar! " . $conn->error);

            if ($sqlQuery->num_rows == 0) {
                ?>
                <tr>
                    <td>Nenhum resultado encontrado...</td>
                </tr>
            <?php } else {
                while($dados =  $sqlQuery->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $dados['id_livro'];?></td>
                        <td><?php echo $dados['titulo'];?></td>
                        <td><?php echo $dados['ano_publicacao'];?></td>
                    </tr>
                    <?php 
                    }
                }
            ?>
        <?php } ?>
    </table>
</div>

<?php
include './components/footer.php';
?>
