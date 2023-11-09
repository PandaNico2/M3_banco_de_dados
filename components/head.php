<?php
// require_once('');
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
    <title>Livraria Nicolau</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/2af89ea81e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <nav>
        <div class="logo">
            <a href="../index.php">
                <img src="../img/nicolau_logo.png" alt="" width="200">
            </a>
        </div>

        <div class="navegadores">
            <a href="./telas_ver/ver_livro.php">
                <h5>Livros</h5>
            </a>
            <a href="./telas_ver/ver_editora.php">
                <h5>Editoras</h5>
            </a>
            <a href="./telas_ver/ver_avaliação.php">
                <h5>Avaliações</h5>
            </a>
            <a href="./telas_ver/ver_emprestimo.php">
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