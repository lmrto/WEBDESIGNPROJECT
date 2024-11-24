<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo à Nossa Playlist</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #FAFAFA;
        }
        /* Cabeçalho */
        header {
            text-align: center;
            padding: 50px 20px;
            background-color: #9370DB;
            color: white;
        }
        header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        header p {
            font-size: 18px;
            color: #DDDDDD;
        }
        /* Sessão de Login */
        .login-section {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
            background-color: #F5F5F5;
        }
        .login-container {
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .login-container input:focus {
            outline: none;
            border-color: #9370DB;
        }
        .login-container button {
            width: 100%;
            padding: 12px;
            background-color: #9370DB;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .login-container button:hover {
            background-color: #9370DB;
        }
        .artists-section {
            padding: 60px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            background-color: #FFFFFF;
        }
        .artist-card {
            background-color: #F0F0F0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 260px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .artist-card:hover {
            transform: translateY(-5px);
        }
        .artist-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .artist-card h3 {
            font-size: 20px;
            margin: 15px;
            color: #333;
        }
        .artist-card p {
            font-size: 14px;
            color: #666;
            margin: 0 15px 15px;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #9370DB;
            color: white;
        }
        footer p {
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    <h1>Bem-vindo à Músicas Unidas</h1>
    <p>Explore o mundo da música com artistas renomados e venha fazer música com a gente!</p>
</header>

<!-- Sessão de Login -->
<section class="login-section">
    <div class="login-container">
        <h2>Faça o login</h2>
        <form action="registrar.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</section>

<!-- Sessão de Artistas e Álbuns -->
<section class="artists-section">
    <div class="artist-card">
        <img src="artista1.jpeg" alt="Imagem do artista 1">
        <h3>KESHI</h3>
        <p>Casey Luong (nascido em 4 de novembro de 1994), conhecido mononimamente por seu nome artístico keshi (estilizado em letras minúsculas), é um cantor, compositor, produtor e multi-instrumentista americano. 
            Conhecido por seus vocais distantes em falsete e instrumentais texturais, ele acumulou mais de 700 milhões de streams com músicas como "like i need u", "2 Soon" e "right here</p>
    </div>
    <div class="artist-card">
        <img src="artista2.jpeg" alt="Imagem do artista 2">
        <h3>HALSEY</h3>
        <p>Ashley Nicolette Frangipane (29 de setembro de 1994), mais conhecida pelo seu nome artístico Halsey, é uma cantora e compositora estadunidense. No início de 2014, 
            assinou seu primeiro contrato com a gravadora Astralwerks, e no final do mesmo ano lançou seu EP de estreia intitulado Room 93. Em agosto de 2015, ela lançou seu primeiro álbum, BADLANDS (Deluxe), 
            que incluía duas faixas do Room 93: "Ghost" e "Hurricane". Em 2 de junho de 2017, foi lançado o seu segundo álbum de estúdio, hopeless fountain kingdom (Deluxe), contendo o single Now or Never.</p>
    </div>
    <div class="artist-card">
        <img src="artista3.jpeg" alt="Imagem do artista 3">
        <h3>ALESSIA CARA</h3>
        <p>Alessia Cara (nascida em 11 de julho de 1996) é uma cantora e compositora canadense, de Toronto, Canadá. Atualmente é contratada pela ´EP Entertainment/Def Jam Recordings e é mais conhecida por seu single 
            de estreia, Here. Antes de seu trabalho com a EP Entertainment/Def Jam, Cara era conhecia por seus covers acústicos de músicas no YouTube</p>
    </div>
</section>

<footer>
    <p>&copy; 2023 Músicas Unidas. Todos os direitos reservados.</p>
</footer>

</body>
</html>