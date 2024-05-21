<?php
    require 'connection.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

        $stmt = $conn->prepare($sql);

        $stmt ->bindParam(':email',$_POST['email']);

        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $stmt ->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Usuario creado con exito!🥳';
        }else{
            $message = 'Lo sentimos, hubo un error al crear el usuario 😔'; 
        }
    }
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\styles-sesion.css">
    <link rel="icon" href="img/icon.png">
    <title>Register - WNG</title>
</head>
<body>

    <a href="index.php">
      <img src="IMG/logo2.png" class="logo">
    </a>
    
    <?php if (!empty($message)): ?>
        <p> <?= $message ?> </p>
    <?php endif; ?>

    <div class="container">
        <h2>Registro</h2>
        
        <form action="register.php" method="post">
            <input type="email" name="email" placeholder="Correo electronico">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Enviar">
            <a href="login.php">¿Tienes cuenta? ¡ Inicia sesion !</a>
        </form>
    </div>
</body>
</html>