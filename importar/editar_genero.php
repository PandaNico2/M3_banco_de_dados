<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_genero');
$genero = filter_input(INPUT_POST, 'genero');


if ($id && $genero) {
    $sql = $conn->prepare("UPDATE genero SET genero = ? WHERE id_genero = ?");
    $sql->bind_param('si', $genero, $id);
    $sql->execute();
    $sql->close();

    header('Location: ../telas_ver/ver_genero.php');
    exit;
} else {
    echo "erro!";
    // header('Location: ../telas_ver/ver_genero.php');
    exit;
}
?>
