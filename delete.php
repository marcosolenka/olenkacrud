<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM BEBIDA WHERE id_BEBIDA = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: read.php");
        exit;
    } else {
        echo "Erro: " . mysqli_error($link);
    }
} else {
    echo "ID inválido.";
}
?>
