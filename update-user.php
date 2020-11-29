<?php

if(isset($_POST)){    
    
    // Conexión a la bbdd:
    require_once 'includes/conexion.php';
    
    // Recoger los valores del formulario de actualización:
    $nombre = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $apellidos = isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    
    // Array de errores
    $errores = array();
    
    // Validar los datos antes de guardarlos en la base de datos
    // Validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validate = true;
    }else{
        $nombre_validate = false;
        $errores['name'] = "El nombre no es válido";
    }
    
    // Validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validate = true;
    }else{
        $apellidos_validate = false;
        $errores['surname'] = "El apellido no es válido";
    }
    
    // Validar email:
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validate = true;
    }else{
        $email_validate = false;
        $errores['email'] = "El email no es válido";
    }
    
    $guardar_usuario = false; 
    
    if(count($errores) == 0){
        $usuario = $_SESSION['student'];
        $guardar_usuario = true; 
        
        // COMPROBAR SI EL EMAIL YA EXISTE
        $sql = "SELECT id, email FROM students WHERE email = '$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        
        if($isset_user['id'] == $usuario['id'] || empty($isset_user)){
            // Actualizar usuario en la tabla usuarios de la bbdd:        
            $sql = "UPDATE students SET ".
                    "name = '$nombre', ".
                    "surname = '$apellidos', ".
                    "email = '$email' ".
                    "WHERE id = ".$usuario['id'];
            $guardar = mysqli_query($db, $sql);

            if($guardar){
                $_SESSION['student']['name'] = $nombre;
                $_SESSION['student']['surname'] = $apellidos;
                $_SESSION['student']['email'] = $email;

                $_SESSION['completado'] = "Tus datos se han actualizado con éxito";            
            }else{
                $_SESSION['errores']['general'] = "Fallo al guardar el actulizar tus datos!!";
            }
        }else{
            $_SESSION['errores'] ['general'] = "¡El usuario ya existe!";
        }        
    }else{
        $_SESSION['errores'] = $errores;        
    }
}
header('Location: calendar-view.php');