<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_classificacao');
$num_estrelas = filter_input(INPUT_POST, 'num_estrelas');


if ($id && $num_estrelas) {
    $sql = $conn->prepare("UPDATE classificacao SET num_estrelas = ? WHERE id_classificacao = ?");
    $sql->bind_param('si', $num_estrelas, $id);
    $sql->execute();
    $sql->close();

    header('Location: /m3_banco_de_dados/telas_ver/ver_classificacao.php');
    exit;
} else {
    header('Location: /m3_banco_de_dados/telas_ver/ver_classificacao.php');
    exit;
}
?>
