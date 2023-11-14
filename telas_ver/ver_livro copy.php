<?php
require_once('../components/head.php');
?>

<div class="content">

<div class="novo_livro">
    <a href="<?php echo BASE_URL; ?>telas_add/add_livro.php">
        + Novo livro
    </a>
</div>

    <div class="box" id="lista-livro">
        <!-- Listagem dos livros -->
    </div>
</div>

<?php
require_once('../components/footer.php');
?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/ver_livro.css">

<script>
    $(document).ready(function() {
        listarLivros();

        function listarLivros() {
            $.ajax({
                url: '../importar/exibir_livro.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        var livro = data[i];
                        var livroHtml = `
                    <div class="livro" id="${livro.id_livro}">
                    <button class="excluir" type="submit" id="${livro.id_livro}"><i class="fa-solid fa-xmark"></i></button>
                        <p>${livro.nome_autor}</p>
                        <h3>${livro.titulo}</h3>
                        <div class="info_livro">
                            <p>${livro.ano_publicacao}</p>
                            <p>${livro.nome_editora}</p>
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

        $(document).on('click', '.excluir', function() {
            var livroId = $(this).attr('id');
            $.ajax({
                url: '../importar/excluir_livro.php',
                method: 'POST',
                data: {
                    id_livro: livroId
                },
                success: function(response) {
                    // console.log("Livro excluído! ID:", livroId);
                    // location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao deletar livro:', error);
                }
            });
        });


        // redirecionar
        $(document).on('click', '.btn-secondary', function() {
            var livroId = $(this).attr('id');

            // Redirecionar para uma página de detalhes ou exibir um modal com mais informações
            window.location.href = 'detalhes_livro.php?id=' + livroId;
        });



    });
</script>