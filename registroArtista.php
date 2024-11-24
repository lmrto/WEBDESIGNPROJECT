<!-- registroArtista.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Artista/Música Concluído</title>
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
            max-width: 400px;
            width: 100%;
            z-index: 1;
        }
        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #007BFF;
        }
        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
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
    <h2>Artista/Música registrados com Sucesso!</h2>
    <p>Agora você pode explorá-la ou criar uma nova.</p>
    <div class="btn-container">
        <a href="listar.php" class="btn btn-primary">Listar Playlists</a>
        <a href="index.php" class="btn btn-secondary">Voltar para a Página Inicial</a>
    </div>
</div>

<!-- Formas geométricas no fundo -->
<div class="shape shape1"></div>
<div class="shape shape2"></div>
<div class="shape shape3"></div>
<div class="shape shape4"></div>

</body>
</html>

<!-- Código do banco -->
<?php
require_once "ClassPlaylist.php";
require_once "ClassPlaylistDAO.php";

// Verificar se os dados do formulário de artista foram enviados via POST
if (isset($_POST['nome']) && isset($_POST['musica']) && isset($_POST['playlist_id'])) {
    // Obter os dados enviados do formulário
    $nome = $_POST['nome'];
    $musica = $_POST['musica'];
    $playlist_id = $_POST['playlist_id'];

    // Criar o objeto Artista e associar à playlist
    $novoArtista = new ClassArtista();
    $novoArtista->setNome($nome);
    $novoArtista->setMusica($musica);
    $novoArtista->setPlaylistId($playlist_id);

    // Instanciar o DAO e registrar o artista
    $playlistDAO = new ClassPlaylistDAO();
    if ($playlistDAO->cadastrarArtista($novoArtista)) {
        echo "";
    } else {
        echo "Erro ao registrar o artista/música.";
    }
}
?>