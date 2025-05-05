<?php
require 'db.php';

$result = mysqli_query($link, "SELECT * FROM BEBIDA");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Bebidas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f4f4f4;
            text-align: center;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            background: white;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            margin: 0 5px;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        .add-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        .add-btn:hover {
            background: #45a049;
        }
	    .logo {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <img class ="logo" src="logo">
    <h2>Lista de Bebidas</h2>
    <a href="create.php" class="add-btn">➕ Adicionar nova bebida</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Valor (R$)</th>
            <th>Ações</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id_BEBIDA'] ?></td>
            <td><?= $row['DS_BEBIDA'] ?></td>
            <td><?= number_format($row['Valor_bebida'], 2, ',', '.') ?></td>
            <td>
                <a href="update.php?id=<?= $row['id_BEBIDA'] ?>">✏️ Editar</a> | 
                <a href="delete.php?id=<?= $row['id_BEBIDA'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta bebida?')">🗑️ Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
