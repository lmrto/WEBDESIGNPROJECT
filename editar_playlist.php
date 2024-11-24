<?php
require_once 'ClassPlaylist.php';
require_once 'ClassPlaylistDAO.php';

$playlistDAO = new ClassPlaylistDAO();
$playlists = $playlistDAO->buscarTodasPlaylists(); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $playlist = null;
    foreach ($playlists as $p) {
        if ($p['id'] == $id) {
            $playlist = $p;
            break;
        }
    }
    
    if (!$playlist) {
        header('Location: listar.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $playlistAtualizada = new ClassPlaylist();
    $playlistAtualizada->setId($_POST['id']);
    $playlistAtualizada->setTitulo($_POST['titulo']);
    $playlistAtualizada->setGenero($_POST['genero']);

    $artistaAtualizado = new ClassArtista();
    $artistaAtualizado->setNome($_POST['nome']);
    $artistaAtualizado->setMusica($_POST['musica']);
    $artistaAtualizado->setPlaylistId($_POST['id']);

    if ($playlistDAO->atualizarPlaylist($playlistAtualizada, $artistaAtualizado)) {
        header('Location: listar.php');
        exit;
    } else {
        echo "Erro ao atualizar a playlist/artista.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Playlist e Artista</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #F5F5F5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
        position: relative;
        overflow: hidden;
    }

    .background-shapes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.15;
    }

    .shape.circle1 {
        width: 200px;
        height: 200px;
        background-color: #FFD700;
        top: 10%;
        left: 15%;
    }

    .shape.circle2 {
        width: 300px;
        height: 300px;
        background-color: #FF6347;
        bottom: 20%;
        right: 10%;
    }

    .shape.square1 {
        width: 150px;
        height: 150px;
        background-color: #40E0D0;
        top: 50%;
        left: 70%;
        transform: rotate(45deg);
    }

    .shape.square2 {
        width: 250px;
        height: 250px;
        background-color: #9370DB;
        bottom: 10%;
        left: 5%;
        transform: rotate(-20deg);
    }

    .container {
        display: flex;
        max-width: 900px;
        width: 100%;
        background-color: #FFFFFF;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        z-index: 1;
    }

    .form-container {
        padding: 40px;
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-container h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        color: #555;
        margin-bottom: 8px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        background-color: #FAFAFA;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #007BFF;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .btn-cancel {
        width: 100%;
        padding: 12px;
        background-color: #FF6347; 
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        text-decoration: none; 
        transition: background-color 0.3s ease;
        margin-top: 10px;
    }

    .btn-cancel:hover {
    background-color: #e55347; 
    }

    .image-container {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: url('music.jpeg') center/cover no-repeat;
        height: 100%; 
    }

    .image-container img {
         width: 100%;
        height: auto;
        max-width: 400px; 
        display: block; 
    }

</style>
</head>
<body>
<div class="background-shapes">
        <div class="shape circle1"></div>
        <div class="shape circle2"></div>
        <div class="shape square1"></div>
        <div class="shape square2"></div>
    </div>
    
    <div class="container">
        <div class="form-container">
            <h2>Editar Playlist e Artista</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="id">Selecione a Playlist</label>
                    <select name="id" required>
                        <option value="<?php echo $playlist['id']; ?>" selected>
                            <?php echo htmlspecialchars($playlist['titulo']); ?>
                        </option>
                    </select>
                </div>

                <!-- Editar Playlist -->
                <div class="form-group">
                    <label for="titulo">Título da Playlist</label>
                    <input type="text" name="titulo" value="<?php echo htmlspecialchars($playlist['titulo']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="genero">Gênero da Playlist</label>
                    <select name="genero" required>
                        <option value="POP" <?php if ($playlist['genero'] == 'POP') echo 'selected'; ?>>POP</option>
                        <option value="INDIE" <?php if ($playlist['genero'] == 'INDIE') echo 'selected'; ?>>Indie</option>
                        <option value="ALTERNATIVO" <?php if ($playlist['genero'] == 'ALTERNATIVO') echo 'selected'; ?>>Alternativo</option>
                        <option value="ROCK" <?php if ($playlist['genero'] == 'ROCK') echo 'selected'; ?>>Rock</option>
                        <option value="KPOP" <?php if ($playlist['genero'] == 'KPOP') echo 'selected'; ?>>KPOP</option>
                        <option value="FUNK" <?php if ($playlist['genero'] == 'FUNK') echo 'selected'; ?>>Funk</option>
                    </select>
                </div>

                <!-- Editar Artista -->
                <div class="form-group">
                    <label for="nome">Nome do Artista</label>
                    <input type="text" name="nome" value="" required>
                </div>

                <div class="form-group">
                    <label for="musica">Nome da Música</label>
                    <input type="text" name="musica" value="" required>
                </div>

                <button type="submit" class="btn-submit">Atualizar</button>
            </form>
                <a href="listar.php" class="btn-cancel">Cancelar</a>
        </div>
        <div class="image-container">
            <img src="music.jpeg" alt="Imagem de Música">
        </div>
    </div>
</body>
</html>