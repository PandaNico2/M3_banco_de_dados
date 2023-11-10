<?php
define('BASE_URL', 'http://localhost/m3_banco_de_dados/');
?>

<html>

<head>
    <title>Livraria Nicolau</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/2af89ea81e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="../css/index.css"> -->
</head>

<body>

    <nav>
        <div class="logo">
            <a href="<?php echo BASE_URL; ?>index.php">
                <img src="../img/nicolau_logo.png" alt="" width="200" onerror="this.src='./img/nicolau_logo.png'">
            </a>
        </div>

        <div class="navegadores">
            <a href="<?php echo BASE_URL; ?>telas_ver/ver_livro.php">
                <h5>Livros</h5>
            </a>
            <a href="<?php echo BASE_URL; ?>telas_ver/ver_editora.php">
                <h5>Editoras</h5>
            </a>
            <a href="<?php echo BASE_URL; ?>telas_ver/ver_avaliação.php">
                <h5>Avaliações</h5>
            </a>
            <a href="<?php echo BASE_URL; ?>telas_ver/ver_emprestimo.php">
                <h5>Emprestimos</h5>
            </a>
        </div>

        <div class="login">
            <div><i class="fa-solid fa-circle-user"></i></div>
            <div class="nome">
                <p>Olá Bem vindo (a)</p><br>
                <p><a href="<?php echo BASE_URL; ?>telas_add/add_leitor.php">Entre ou cadastre-se</a></p>
            </div>
        </div>
    </nav>


    <style>
        body {
    background-color: #5f16e728;
}

/* Barra de navegação */
nav {
    display: inline-flex;
    justify-content: space-evenly;
    align-items: center;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    background-color: white;
}

div.navegadores {
    display: inline-flex;
    justify-content: space-around;
    width: 500px
}

div.login {
    display: inline-flex;
    align-items: center;
}

div.login div {
    display: flex;
    flex-direction: column;
    margin: 10px;
}

div.login div p {
    margin: 0
}

div.nome {
    width: 160px
}

div.login div i {
    font-size: 25px;
    color: #5f18eb;
}

footer a:hover,
nav h5:hover {
    color: #5500ff;
    text-decoration: none;
}


nav a:hover {
    color: #5500ff;
    text-decoration: none;
    font-weight: 600;
}

nav a {
    color: #5f18eb;
}

nav p,
nav h5 {
    color: black;
}

div.content {
    background-color: white;
    width: 90%;
    min-height: 300px;
    margin: 0 auto;
    padding: 20px;
}

/* Footer */
footer {
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

footer table th {
    color: #5f18eb;
}

footer table th,
footer table td {
    border: 0 !important;
}

footer {
    padding: 0px 10%;
    display: inline-flex;
    width: 100%
}

footer a {
    color: black
}
    </style>

    