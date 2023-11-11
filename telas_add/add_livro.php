<?php
require_once('../components/head.php');
?>

<div class="content">
    <form id="criar_livro">
        <label for="">Titulo</label>
        <input type="text" id="titulo" placeholder="Titulo">
        <br>

        <label for="">Ano de publicação</label>
        <input type="number" id="ano_publicacao">
        <br>

        <label for="">isbn</label>
        <input type="number" id="isbn">
        <br>

        <label for="">Número de paginas</label>
        <input type="number" id="numero_paginas">
        <br>

        <label for="">Sinopse</label>
        <input type="text" id="sinopse" placeholder="Sinopse...">
        <br>

        <label for="">Genero</label>
        <select name="genero" id="genero">
        </select>
        <br>

        <label for="">Editora</label>
        <select name="editora" id="editora">
        </select>
        <br>

        <label for="">Idioma</label>
        <select name="idioma" id="idioma">
        </select>
        <br>

        <button>Adicionar</button>
    </form>
</div>

<?php
require_once('../components/footer.php');
?>

<script>
    listarGenero()
    listarEditora()
    listarIdioma()

    function listarGenero() {
        $.ajax({
            url: '../importar/exibir_genero.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#genero').empty();
                $('#genero').append('<option value="">Selecione um gênero</option>');

                $.each(data, function(index, element) {
                    $('#genero').append('<option value="' + element.id_genero + '">' + element.genero + '</option>');
                });
            },
            error: function(error) {
                console.log('Erro ao obter dados do servidor:', error);
            }
        });
    }

    function listarEditora() {
        $.ajax({
            url: '../importar/exibir_editora.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#editora').empty();
                $('#editora').append('<option value="">Selecione a editora</option>');

                $.each(data, function(index, element) {
                    $('#editora').append('<option value="' + element.id_editora + '">' + element.nome + '</option>');
                });
            },
            error: function(error) {
                console.log('Erro ao obter dados do servidor:', error);
            }
        });
    }

    function listarIdioma() {
        $.ajax({
            url: '../importar/exibir_idioma.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#idioma').empty();
                $('#idioma').append('<option value="">Selecione o idioma</option>');

                $.each(data, function(index, element) {
                    $('#idioma').append('<option value="' + element.id_idioma + '">' + element.nome + '</option>');
                });
            },
            error: function(error) {
                console.log('Erro ao obter dados do servidor:', error);
            }
        });
    }


    $('#criar_livro').submit(function(e) {
        e.preventDefault();

        var titulo = document.getElementById('titulo').value;
        console.log(titulo);

        var ano_publicacao = document.getElementById('ano_publicacao').value;
        console.log(ano_publicacao);

        var isbn = document.getElementById('isbn').value;
        console.log(isbn);

        var numero_paginas = document.getElementById('numero_paginas').value;
        console.log(numero_paginas);

        var sinopse = document.getElementById('sinopse').value;
        console.log(sinopse);

        var genero = document.getElementById('genero').value;
        console.log(genero);

        var editora = document.getElementById('editora').value;
        console.log(editora);

        var idioma = document.getElementById('idioma').value;
        console.log(idioma);

        $.ajax({
            url: '../importar/criar_livro.php',
            type: 'POST',
            data: {
                titulo: titulo,
                ano_publicacao: ano_publicacao,
                isbn: isbn,
                numero_paginas: numero_paginas,
                sinopse: sinopse,
                genero: genero,
                editora: editora,
                idioma: idioma
                // Inclua aqui as variáveis ausentes, se necessário
            },
            success: function(response) {
                console.log(response);
                alert("Livro inserido!");
            },
            error: function(error) {
                console.log('Error:', error);
                alert("Error during form submission. Please try again.");
            }
        });
    });
</script>