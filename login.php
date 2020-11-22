<?php 
    include("con_db.php");

    if(isset($_POST['login'])){

        if(strlen($_POST['username']) >= 1 &&
            strlen($_POST['pass']) >= 1 ){

                $username = trim($_POST['username']);
                $pass = trim($_POST['pass']);

                $query = mysqli_query($con,"SELECT * FROM students WHERE username = '$username' and pass = '$pass'");
                $nr = mysqli_num_rows($query);

                if($nr == 1){

                    session_start();
                    $_SESSION['username'] = $username;
                    header("Location: panel_principal.php");

                }else{

                    $query = mysqli_query($con,"SELECT * FROM users_admin WHERE username = '".$username."' and password = '".$pass."'");
                    $nr = mysqli_num_rows($query);

                    if($nr == 1){
                        
                        session_start();
                        $_SESSION['username'] = $username;
                        header("Location: panel_administracion.php");

                    }else if($nr == 0){

                        header("Location: index.html");
                    }

                }
        }else{
            ?>
            <h3 class="bad">Por favor, completa todos los campos</h3>
            <?php
        };
        //limpia el resultado de nuestra consulta almacenado en la variable $query
        mysqli_free_result($query);
        //Cierra la conexión con la BBDD para evitar errores
        mysqli_close($con);
    };
?>