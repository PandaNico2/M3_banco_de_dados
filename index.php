<?php
// require_once('conexao.php');

// $sql = file_get_contents('./Dump20231107/biblioteca_livro.sql');

// if ($conn->multi_query($sql) === TRUE) {
//     // echo "Importação do banco de dados bem-sucedida!";
// } else {
//     echo "Erro ao importar banco de dados: " . $conn->error;
// }

// $conn->close();
?>


<html>

<head>
    <title>Biblioteca</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/2af89ea81e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">

</head>


<body>
    <nav>
        <div class="logo">
            <a href="./index.php">
                <img src="./img/nicolau_logo.png" alt="" width="200">
            </a>
        </div>

        <div class="navegadores">
            <a href="">
                <h5>Livros</h5>
            </a>
            <a href="">
                <h5>Editoras</h5>
            </a>
            <a href="">
                <h5>Avaliações</h5>
            </a>
            <a href="">
                <h5>Emprestimos</h5>
            </a>
        </div>

        <div class="login">
            <div><i class="fa-solid fa-circle-user"></i></div>
            <div class="nome">
                <p>Olá Bem vindo (a)</p><br>
                <p><a href="">Entre ou cadastre-se</a></p>
            </div>
        </div>
    </nav>

    <div class="content">

    </div>

    <footer>
        <table class="table">
            <thead>
                <tr>
                    <th>Cadastros</th>
                    <th>Usuarios</th>
                    <th>Serviçõs</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Livro</td>
                    <td>Autor</td>
                    <td>Avaliação</td>
                </tr>
                <tr>
                    <td>Editoras</td>
                    <td>Leitor</td>
                    <td>Emprestimos</td>
                </tr>
            </tbody>
        </table>
        <img src="./img/logo_roxa.png" alt="">
    </footer>

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