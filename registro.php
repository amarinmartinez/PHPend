<?php 

    //enlace con el archivo de conexión a la BBDD
    include("con_db.php");

    //Condicional - 
    if(isset($_POST['register'])){

        if(strlen($_POST['username']) >= 1 &&
            strlen($_POST['pass']) >= 1 &&
            strlen($_POST['email']) >= 1 &&
            strlen($_POST['name']) >= 1 &&
            strlen($_POST['surname']) >= 1 &&
            strlen($_POST['telephone']) >= 1 ){

                $username = trim($_POST['username']);
                $pass = trim($_POST['pass']);
                $email = trim($_POST['email']);
                $name = trim($_POST['name']);
                $surname = trim($_POST['surname']);
                $telephone = trim($_POST['telephone']);
                $nif = trim($_POST['nif']);
                $date_registered = date("Y-m-d H:i:s");

                $consulta = "INSERT INTO students(username,pass,email,name,surname,telephone,nif,date_registered) VALUES ('$username','$pass','$email','$name','$surname','$telephone','$nif','$date_registered')";
                $resultado = mysqli_query($con,$consulta);

                if($resultado){
                    ?>
                    <h3 class="ok">Te has registrado correctamente</h3>
                    <?php  
                    header("Location: formulario_login.html");  

                }else{
                    ?>
                    <h3 class="bad">Ups! parece que ha habido algún problema</h3>
                    <?php
                    die(mysqli_connect_error());
                }
        }else{
            ?>
            <h3 class="bad">Por favor, completa todos los campos</h3>
            <?php
        };
        //Cierra la conexión con la BBDD para evitar errores
        mysqli_close($con);
    };

?>