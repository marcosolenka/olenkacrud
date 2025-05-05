<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ds_bebida = $_POST['ds_bebida'];
        $valor_bebida = $_POST['valor_bebida'];

        $sql = "UPDATE BEBIDA SET DS_BEBIDA = ?, Valor_bebida = ? WHERE id_BEBIDA = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "sdi", $ds_bebida, $valor_bebida, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "Atualizado com sucesso. <a href='read.php'>Voltar</a>";
            exit;
        } else {
            echo "Erro: " . mysqli_error($link);
        }
    } else {
        $sql = "SELECT * FROM BEBIDA WHERE id_BEBIDA = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    }
} else {
    echo "ID inválido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Bebida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 50px;
            background: #f2f2f2;
            text-align: center;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            margin: 10px;
            width: 300px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        a {
            display: block;
            margin-top: 20px;
        }
               .logo {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

<img src="logo" class="logo">
<h2>Editar Bebida</h2>

<form method="POST">
    Nome da Bebida: <br>
    <input type="text" name="ds_bebida" value="<?= htmlspecialchars($row['DS_BEBIDA']) ?>" required><br>
    
    Valor: <br>
    <input type="number" step="0.01" name="valor_bebida" value="<?= htmlspecialchars($row['Valor_bebida']) ?>" required><br>
    
    <input type="submit" value="Atualizar">
</form>

<a href="read.php">Voltar à lista</a>

</body>
</html>
