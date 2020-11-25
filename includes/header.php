<?php require_once 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>School Schedule app</title>
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    </head>
    <body>
    <!-- HEADER -->
    <header id="header">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">
                <h1>Aplicación de Creación de Horario Escolar</h1>
            </a>
        </div>

        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php if(!isset($_SESSION['student'])): ?> <!-- Si NO existe el usuario identificado -->
                <li>
                    <a href="form-login.php">Login</a>
                </li>  
                <li>
                    <a href="form-register.php">Registrarse</a>
                </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['student'])): ?> <!-- Si NO existe el usuario identificado -->
                <li>
                    <a href="calendar.php">Calendrio</a>
                </li>  
                <?php endif; ?>
            </ul>            

            <?php if(isset($_SESSION['student'])): ?> <!-- Si existe el usuario identificado -->        
                <div id="user-logged">
                    <a href="logout.php" class="boton boton-rojo">Cerrar sesión</a>
                    <h3>Bienvenido, <?=$_SESSION['student'] ['name']. ' '.$_SESSION['student']['surname']; ?></h3> <!-- Se imprimen los datos por pantalla -->  
                </div>
            <?php endif; ?>    
        </nav> 

        <div class="clearfix"></div>

    </header>

    <div id="container">
