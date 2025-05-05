<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ds_bebida = $_POST['ds_bebida'];
    $valor_bebida = $_POST['valor_bebida'];

    $sql = "INSERT INTO BEBIDA (DS_BEBIDA, Valor_bebida) VALUES (?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sd", $ds_bebida, $valor_bebida);

    if (mysqli_stmt_execute($stmt)) {
        $mensagem = "✅ Bebida adicionada com sucesso!";
    } else {
        $mensagem = "❌ Erro ao adicionar bebida: " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Bebida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
            text-align: center;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 6px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .mensagem {
            margin: 20px 0;
            font-weight: bold;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
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
    <h1>Adicionar Bebida</h1>

    <?php if (isset($mensagem)): ?>
        <div class="mensagem"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="POST">
        <label>Nome da Bebida:</label><br>
        <input type="text" name="ds_bebida" required><br>

        <label>Valor (R$):</label><br>
        <input type="number" step="0.01" name="valor_bebida" required><br>

        <input type="submit" value="Adicionar">
    </form>

    <br><a href="read.php">📋 Ver todas as bebidas</a>
</body>
</html>
