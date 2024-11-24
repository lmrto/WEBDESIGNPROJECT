<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Playlist</title>
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
            max-width: 800px;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            z-index: 1;
        }
        .form-container {
            padding: 40px;
            width: 50%;
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
        .image-container {
            width: 50%;
            background: url('music.jpeg') center/cover no-repeat; /* Corrigido o caminho da imagem */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
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
        <h2>Crie a Playlist</h2>
        <form action="registroMusica.php" method="GET">
            <div class="form-group">
                <label for="titulo">Título da playlist:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="genero">Selecione o gênero da playlist:</label>
                <select id="genero" name="genero">
                    <option value="POP">POP</option>
                    <option value="INDIE">Indie</option>
                    <option value="ALTERNATIVO">Alternativo</option>
                    <option value="ROCK">Rock</option>
                    <option value="KPOP">KPOP</option>
                    <option value="FUNK">Funk</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Registrar música</button>
        </form>
        <form action="registrar.php" method="GET">
        </form>
    </div>
    <div class="image-container">
        <img src="music.jpeg" alt="Imagem de Música"/>
    </div>
</div>

</body>
</html>
