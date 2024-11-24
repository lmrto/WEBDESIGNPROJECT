<?php
require_once 'ClassPlaylistDAO.php';

$playlistDAO = new ClassPlaylistDAO();
$playlists = $playlistDAO->listarPlaylist();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Playlists</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
            color: #333;
            overflow: hidden;
        }
        .container {
            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
            z-index: 1;
        }
        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #007BFF;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: white;
            text-decoration: none;
        }
        .btn-primary {
            background-color: #007BFF;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #565e64;
        }
        .actions {
            display: flex;
            justify-content: space-evenly;
        }

        /* Formas geométricas no fundo */
        .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.6;
            z-index: 0;
        }
        .shape1 {
            width: 150px;
            height: 150px;
            background-color: #ff6b6b;
            top: 20%;
            left: 10%;
        }
        .shape2 {
            width: 100px;
            height: 100px;
            background-color: #1dd1a1;
            top: 70%;
            right: 15%;
        }
        .shape3 {
            width: 200px;
            height: 200px;
            background-color: #54a0ff;
            top: 50%;
            left: 70%;
        }
        .shape4 {
            width: 120px;
            height: 120px;
            background-color: #ff9ff3;
            bottom: 10%;
            right: 5%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lista de Playlists</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Gênero</th>
                <th>Nome</th>
                <th>Música</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

        <?php
            foreach ($playlists as $playlist): ?>
                <tr>
                    <td><?php echo $playlist['id']; ?></td>
                    <td><?php echo $playlist['titulo']; ?></td>
                    <td><?php echo $playlist['genero']; ?></td>
                    <td><?php echo $playlist['nome']; ?></td>
                    <td><?php echo $playlist['musica']; ?></td>
                    <td class="actions">
                        <a href="editar_playlist.php?id=<?php echo $playlist['id']; ?>" class="btn btn-primary">Editar</a>
                        <a href="excluir_playlist.php?id=<?php echo $playlist['id']; ?>" class="btn btn-secondary">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="btn-container">
        <a href="registrar.php" class="btn btn-primary">Voltar para a criação de playlist</a>
    </div>
</div>

<!-- Formas geométricas no fundo -->
<div class="shape shape1"></div>
<div class="shape shape2"></div>
<div class="shape shape3"></div>
<div class="shape shape4"></div>

</body>
</html>