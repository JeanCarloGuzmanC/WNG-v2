<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /PaginaMain-WNG');
  }
  require 'connection.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /PaginaMain-WNG");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\styles-sesion.css">
    <link rel="icon" href="IMG/icon.png">
    <title>Login - WNG</title>
</head>
<body>

    <?php if (!empty($message)): ?>
        <p> <?= $message ?> </p>
    <?php endif; ?>

    <a href="index.php">
      <img src="IMG/logo2.png" class="logo">
    </a>
    
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="Correo electronico">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Enviar">
            <a href="register.php">¿No tienes cuenta? ¡ Registrate !</a>
        </form>
    </div>
</body>
</html>
