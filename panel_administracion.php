<?php

        //iniciamos sesión
        session_start();

        //Guardamos el valor de username en la variable ¢varsesion como validación de sesión iniciada
        $varsesion = $_SESSION['username'];
    
        //si ¢varsesión es null o está vacía nos mostrará el mensaje de error y no mostrará el resto del contenido.
        if($varsesion == null || $varsesion == ''){
            header("location: sinpermiso.html");
            die();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="estilos.css" />
</head>
<body>

    <h1>Panel de administración</h1>

    <ul class=menu>
    <li><a href="XXXX">Perfil</a></li>
    <li><a href="XXXX">Lo que sea</a></li>
    <li><a href="logout.php">Cerrar sesión</a></li>
    </ul>

    <h2>Bienvenido <?php echo $_SESSION['username'] ?></h2>
    
</body>
</html>