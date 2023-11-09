
<?php
require_once('../components/head.php');
?>

<head>
    <title>Nicolau - Livros</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/2af89ea81e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">

</head>

<body>
    <nav>
        <div class="logo">
            <a href="../index.php">
                <img src="../img/nicolau_logo.png" alt="" width="200">
            </a>
        </div>

        <div class="navegadores">
            <a href="../telas_ver/ver_livro.php">
                <h5>Livros</h5>
            </a>
            <a href="../telas_ver/ver_editora.php">
                <h5>Editoras</h5>
            </a>
            <a href="../telas_ver/ver_avaliação.php">
                <h5>Avaliações</h5>
            </a>
            <a href="../telas_ver/ver_emprestimo.php">
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
        <!-- <div id="dados"></div> -->
        <h1>ver livros</h1>
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
                    <td><a href="../telas_add/add_livro.php">Livro</a></td>
                    <td><a href="../telas_add/add_autor.php">Autor</a></td>
                    <td><a href="../telas_add/add_avaliacao.php">Avaliação</a></td>
                </tr>
                <tr>
                    <td><a href="../telas_add/add_editora.php">Editoras</a></td>
                    <td><a href="../telas_add/add_leitor.php">Leitor</a></td>
                    <td><a href="../telas_add/add_emprestimo.php">Emprestimos</a></td>
                </tr>
            </tbody>
        </table>
        <img src="../img/logo_roxa.png" alt="">
    </footer>

</body>

</html>