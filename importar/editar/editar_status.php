<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/m3_banco_de_dados/conexao.php');

$id = filter_input(INPUT_POST, 'id_status');
$status = filter_input(INPUT_POST, 'status');


if ($id && $status) {
    $sql = $conn->prepare("UPDATE status SET status = ? WHERE id_status = ?");
    $sql->bind_param('si', $status, $id);
    $sql->execute();
    $sql->close();

    header('Location: /m3_banco_de_dados/telas_ver/ver_status.php');
    exit;
} else {
    echo "erro!";
    header('Location: /m3_banco_de_dados/telas_ver/ver_status.php');
    exit;
}
?>

