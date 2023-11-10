<?php
require_once('../components/head.php');
require_once('../conexao.php');
?>

<div class="content">
    <div class="box" id="lista-livro">
       
    </div>
</div>
<link rel="stylesheet" href="../css/ver_livro.css">
<?php
require_once('../components/footer.php');
?>
<script>
$(document).ready(function() {
    listarLivros();

    function listarLivros() {
        $.ajax({
            url: '../adcionar.php', // Update the URL to the correct file
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    var livro = data[i];
                    var livroHtml = `
                    <div class="livro" id="${livro.livro_id_genero}">
                        <p id="id_autor_livro">${livro.nome_autor}</p>
                        <h3>${livro.titulo}</h3>
                        <div class="info_livro">
                            <p>${livro.ano_publicacao}</p>
                            <p id="${livro.livro_id_editora}">${livro.nome_editora}</p>
                            </div>
                            <button class="btn btn-secondary" id="${livro.id_livro}">Ver mais informações</button>
                        </div>
                    `;

                    // Append to the correct row based on the index
                    if (i % 4 === 0) {
                        $('#lista-livro').append('<div class="row">');
                    }

                    // Append the current book
                    $('.row:last').append(livroHtml);

                    // Close the row after every fourth book
                    if ((i + 1) % 4 === 0 || i === data.length - 1) {
                        $('#lista-livro').append('</div>');
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching livro data:', error);
            }
        });
    }
});
</script>