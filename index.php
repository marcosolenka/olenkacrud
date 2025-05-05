<?php
// Página inicial do CRUD de Bebidas
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Bebidas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
            padding: 50px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        a:hover {
            background-color: #45a049;
        }
        .logo {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <img src="logo" alt="Logo do Bar" class="logo">
    <h1>Olenka's Bar</h1>
    <p>Escolha uma das opções abaixo:</p>

    <a href="create.php">➕ Adicionar Bebida</a>
    <a href="read.php">📋 Ver Lista de Bebidas</a>
</body>
</html>
