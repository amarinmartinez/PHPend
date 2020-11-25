<?php
// Iniciar la sesión y la conexión a bd:
require_once 'includes/conexion.php';

// Recoger datos del formulario:
if(isset($_POST)){
    
        // Borrar error login anterior:
        if(isset($_SESSION['error_login'])){
            unset($_SESSION['error_login']);
        }

        // Recoger datos del formulario:
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

    // Consulta para comprobar las credenciales del usuario:
    $sql = "SELECT * FROM students WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1){ // Si login = true y al contar num filas de login = 1
        $student = mysqli_fetch_assoc($login); // Extrae array asociativo de los datos del estudiante

        // Cifrar y comprobar la contraseña:
        $verify = password_verify($password, $student['pass']);

        if($verify){
            // Utilizar una sesión para guardar los datos del estudiante logueado:
            $_SESSION['student'] = $student;        

        }else{
            // Si algo falla enviar una sesión con el fallo:
            $_SESSION['error_login'] = "¡Login incorrecto!";
            
        }    
    }else{
        // Mensaje de error:
        $_SESSION['error_login'] = "¡Login incorrecto!";
    }
}

// Redirigir al index.php:
header("Location: calendar-view.php");