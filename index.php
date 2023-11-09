<?php
require_once('./components/head.php');
// require_once('conexao.php');

// $sql = file_get_contents('./Dump20231107/biblioteca_livro.sql');

// if ($conn->multi_query($sql) === TRUE) {
//     // echo "Importação do banco de dados bem-sucedida!";
// } else {
//     echo "Erro ao importar banco de dados: " . $conn->error;
// }

// $conn->close();
?>

    <div class="content">
        <!-- <div id="dados"></div> -->
    </div>

    <footer>
        <table class="table">
            <thead>
                <tr>
                    <th>Cadastros</th>
                    <th>Usuarios</th>
                    <th>Serviçõs</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="./telas_add/add_livro.php">Livro</a></td>
                    <td><a href="./telas_add/add_autor.php">Autor</a></td>
                    <td><a href="./telas_add/add_avaliacao.php">Avaliação</a></td>
                </tr>
                <tr>
                    <td><a href="./telas_add/add_editora.php">Editoras</a></td>
                    <td><a href="./telas_add/add_leitor.php">Leitor</a></td>
                    <td><a href="./telas_add/add_emprestimo.php">Emprestimos</a></td>
                </tr>
            </tbody>
        </table>
        <img src="./img/logo_roxa.png" alt="">
    </footer>

</body>

</html>


<script>
    $(document).ready(function() {
        $.ajax({
            url: './dados.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var output = '<ul>';
                $.each(data, function(index, element) {
                    output += '<li>ID: ' + element.id_livro + ', Titulo: ' + element.titulo + ', ano de publicacao: ' + element.ano_publicacao + '</li>';
                });
                output += '</ul>';
                $('#dados').html(output);
            },
            error: function(xhr, status, error) {
                console.log('Erro ao carregar dados: ' + error);
            }
        });
    });
</script>