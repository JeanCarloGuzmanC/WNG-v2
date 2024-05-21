<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WNG - Anuncios</title>
    <link rel="icon" href="./img/icon.png" type="image/png">
    <link rel="stylesheet" href="CSS\styles-post.css">
</head>
<body>
    <header>
        <a href="index.php">
            <img src="img\icon.png" alt="Logo" id="logo">
        </a>
        <h1>WHAT'S NEW GAMES - FREELANCER</h1>
        <button id="crearAnuncioBtn">Crear Anuncio</button>
    </header>
    <main id="mainContent">
        <p>¡Aqui podras ver y crear anuncios!</p>
    </main>

    <div id="crearAnuncioModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Crear Tu Anuncio</h2>
            <form id="crearAnuncioForm">
                <label for="titulo">Título:</label><br>
                <input type="text" id="titulo" name="titulo" required><br>
                <label for="descripcion">Descripción:</label><br>
                <textarea id="descripcion" name="descripcion" required></textarea><br>
                <label for="lenguaje">Lenguaje de Programación:</label><br>
                <select id="lenguaje" name="lenguaje" required>
                    <option value="JavaScript">JavaScript</option>
                    <option value="Python">Python</option>
                    <option value="Java">Java</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select><br>
                <label for="precio">Precio (En dolares):</label><br>
                <input type="number" id="precio" name="precio" required><br><br>
                <button type="submit">Publicar</button>
            </form>
        </div>
    </div>

    <script src="js\scripts-post.js"></script>
</body>
</html>
