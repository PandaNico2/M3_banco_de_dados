<?php
require_once('conexao.php');

$sql = file_get_contents('./Dump20231107/biblioteca_livro.sql');

if ($conn->multi_query($sql) === TRUE) {
    // echo "Importação do banco de dados bem-sucedida!";
} else {
    echo "Erro ao importar banco de dados: " . $conn->error;
}

$conn->close();
?>


<html>

<head>
    <title>Biblioteca</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body>
<nav class="nav justify-content-center">
<img src="./img/logo_violeta.png" alt="" height="100">
<h1>Teste</h1>
</nav>

    <!-- <div id="dados"></div> -->
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