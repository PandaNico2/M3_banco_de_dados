<?php
define('BASE_URL', 'http://localhost/m3_banco_de_dados/');
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Livraria Nicolau</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/2af89ea81e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/index.css">
</head>

<body>

    <nav class="head">
        <div class="logo">
            <a href="<?php echo BASE_URL; ?>index.php">
                <img src="<?php echo BASE_URL; ?>img/nicolau_logo.png" alt="" width="200">
            </a>
        </div>

        <div class="busca">
            <input type="text" placeholder="Busca ....">
            <button class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <div class="navegadores">
            <a href="<?php echo BASE_URL; ?>telas_ver/ver_livro.php">
                <h5>Livros</h5>
            </a>
            <a href="<?php echo BASE_URL; ?>telas_ver/ver_avaliacao.php">
                <h5>Avaliações</h5>
            </a>
            <a href="<?php echo BASE_URL; ?>telas_ver/ver_emprestimo.php">
                <h5>Emprestimos</h5>
            </a>
        </div>
        

        <!-- <div class="login">
            <div><i class="fa-solid fa-circle-user"></i></div>
            <div class="nome">
                <p>Olá Bem vindo (a)</p><br>
                <p><a href="<?php echo BASE_URL; ?>telas_add/add_leitor.php">Entre ou cadastre-se</a></p>
            </div>
        </div> -->
    </nav>