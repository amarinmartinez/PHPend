<?php 

    //Enlace con el archivo que conecta con la BBDD
    include("con_db.php");

    //Se ejecuta el bloque solo si se ha pulsado el botón del formulario de login
    if(isset($_POST['login'])){

        //Se ejecuta el bloque solo si todos los campos contienen al menos un caracter
        if(strlen($_POST['username']) >= 1 &&
            strlen($_POST['pass']) >= 1 ){

                //Guardamos en variables el contenido de los campos de formulario, usando la función trim para eliminar posibles espacios delante y/o detrás de los caracteres
                $username = trim($_POST['username']);
                $pass = trim($_POST['pass']);

                //Realiza la consulta buscando la coincidencia de ambos campos en la tabla students
                $query = mysqli_query($con,"SELECT * FROM students WHERE username = '$username' and pass = '$pass'");

                //Cuenta el numero de líneas que se obtienen como respuesta de la consulta anterior. 0 si no hay coincidencia y 1 si la hay
                $nr = mysqli_num_rows($query);

                //Si hay coincidencia en la tabla students
                if($nr == 1){

                    //Se inicia sesión y se redirige al usuario al Panel Principal
                    session_start();
                    $_SESSION['username'] = $username;
                    header("Location: panel_principal.php");

                }else{//Si no hay coincidencia

                    //Se realiza la misma búsqueda en la tabla de users_admin con la misma lógica. Si hay coincidencia se redirige a Panel de Administración.
                    $query = mysqli_query($con,"SELECT * FROM users_admin WHERE username = '".$username."' and password = '".$pass."'");
                    $nr = mysqli_num_rows($query);

                    if($nr == 1){
                        
                        //Se inicia sesión y se redirige al usuario al Panel de administración
                        session_start();
                        $_SESSION['username'] = $username;
                        header("Location: panel_administracion.php");

                    }else if($nr == 0){//Si tampoco hay coincidencia se muestra el siguiente mensaje.
                        ?>
                        <h3 class="bad">Lo sentimos, no se han encontrado coincidencias.</h3>
                        <?php
                    }

                }
        }else{//si al menos uno de los campos está vacío se muestra el siguiente mensaje
            ?>
            <h3 class="bad">Por favor, completa todos los campos</h3>
            <?php
        };
        //limpia el resultado de nuestra consulta almacenado en la variable $query
        mysqli_free_result($query);

        //Cierra la conexión con la BBDD para evitar errores
        mysqli_close($con);
    }
?>