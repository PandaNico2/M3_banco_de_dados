<?php
require_once('../components/head.php');
?>

<div class="content">
    <form id="usuario-form">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <button type="submit">Adicionar Usuário</button>
    </form>
</div>

<?php
require_once('../components/footer.php');
?>

<script>
    $('#usuario-form').submit(function(e) {
        e.preventDefault();
        var nome = $('#nome').val();
        var email = $('#email').val();
        $.ajax({
            url: 'adicionar_usuario.php',
            type: 'POST',
            data: {
                nome: nome,
                email: email
            },
            success: function(response) {
                console.log(response);
                $('#nome').val('');
                $('#email').val('');
                listarUsuarios();
            }
        });
    });
</script>