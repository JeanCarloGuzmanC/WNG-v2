<?php
session_start();

require 'connection.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if (count($results) > 0) {
    $user = $results;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WNG</title>
    <link rel="stylesheet" href="CSS\styles.css">
    <link rel="icon" href="./img/icon.png" type="image/png">
</head>
<body>
    <header class="banner" id="banner">
        <div class="container">
            <img src="img/icon.png" class="logo">
            <h1 class="title">WHAT'S NEW GAMES - FREELANCER</h1>
        </div>
    </header>

    <?php if(!empty($user)): ?>
      <br> Bienvenido/a. <?= $user['email']; ?>
      <br>Has iniciado sesion con extito!
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>

    <h1>Por favor inicia sesion o registrate</h1>
    <a href="login.php">Inicia sesion</a> or 
    <a href="register.php">Registrate</a>

    <?php endif; ?>

    <div class="container_info">
        <section class="info" data-sr="enter left over 1s">
            <h2>¿Qué somos?</h2>
            <p>
                What's New Games es una plataforma para desarrolladores o entusiasta, somos una página web donde los desarrolladores podrán contactarse entre si para
                solucionar problemas en su código, bien sea ayuda, dudas o tutorias. Es el lugar perfecto para avanzar en tu código y mejorar con la ayuda de otros programadores.
            </p>
            <img src="./img/hombre-mirando-computadora-portatil-entrecerrando-ojos-anteojos-interior_116547-16407.png" id="t1" class="info">
        </section>
        <section class="info" data-sr="enter bottom over 1s">
            <h2>¿Como funciona?</h2>
            <p>
                Tienes que crear una solicitud en nuestra página web, después de eso, un desarrollador interesado te contactará, (debes ser especifico en tu solicitud)
                pueden llegar a un acuerdo de pago y de trabajo, una vez finalice el tiempo acordado debes dar de baja tu solicitud, esto ayudará a que otros desarrolladores
                se enfoquen en otras peticiones.
            </p>
            <img src="./img/depositphotos_21186969-stock-photo-deal-is-done.jpg" id="t1" class="info">
        </section>
        <section class="info" data-sr="enter right over 1s">
            <h2>¡A TENER EN CUENTA!</h2>
            <p>
                Somos un proyecto integrador de la Universidad San Buenaventura, puede que el producto tenga errores, busgs o otras deficiencias, sin embargo,
                seguimos trabajando para concretar una pagina web a la altura, estamos dispuestos a cambiar, borrar o mejorar aspectos de nuestro producto, muchas gracias
                por la atención.
            </p>
            <p>
                ⬇ Codigo original de esta pagina ⬇
            </p>
            <a href="">GitHub Code</a>
        </section>
        <a href="pag-post.php">Modo de prueba</a>
    </div>
    
    <footer class="footer">
        <p>Página de presentación de proyecto What's New Games V2.</p>
        <p>Desarrollado por:</p>
        <p>Daniel Santiago Becerra</p>
        <p>Jean Carlo Guzmán</p>
        <p>Univesidad San Buenaventura BOG.</p>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js\script.js"></script>

</body>
</html>
