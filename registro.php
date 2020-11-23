<?php 

    //Enlace con el archivo que conecta con la BBDD y el de funciones almacenadas
    include("con_db.php");

    //Se ejecuta el bloque solo si se ha pulsado el botón del formulario de registro de estudiante
    if(isset($_POST['register'])){

        //Se ejecuta el bloque solo si todos los campos contienen al menos un caracter
        if(strlen($_POST['username']) >= 1 &&
            strlen($_POST['pass']) >= 1 &&
            strlen($_POST['email']) >= 1 &&
            strlen($_POST['name']) >= 1 &&
            strlen($_POST['surname']) >= 1 &&
            strlen($_POST['telephone']) >= 1 ){

                //Guardamos en variables el contenido de los campos de formulario, usando la función trim para eliminar posibles espacios delante y/o detrás de los caracteres
                $username = trim($_POST['username']);
                $pass = trim($_POST['pass']);
                $email = trim($_POST['email']);
                $name = trim($_POST['name']);
                $surname = trim($_POST['surname']);
                $telephone = trim($_POST['telephone']);
                $nif = trim($_POST['nif']);
                $date_registered = date("Y-m-d H:i:s");
                    
                //realizamos la consulta en busca de coincidencias
                $userRep = mysqli_query($con,"SELECT * from students WHERE username = '$username'");

                //contamos el número de líneas que da la consulta realizada, será 0 o 1.
                $ur = mysqli_num_rows($userRep);

                if($ur == 1){
                    echo "El nombre de usuario introducido ya existe. Por favor, introduce uno distinto.<br>";
                }

                $mailRep = mysqli_query($con,"SELECT * from students WHERE email = '$email'"); 
                $mr = mysqli_num_rows($mailRep);

                if($mr == 1){
                    echo "El Email introducido ya existe. Por favor, introduce uno distinto.";
                }

                //El bloque se ejecuta si no hay coincidencias en ninguna de las dos consultas.
                if($ur == 0 && $mr == 0){

                    //Guardamos en la variable $consulta la sentencia que introduce los valores en cada campo de la tabla
                    $consulta = "INSERT INTO students(username,pass,email,name,surname,telephone,nif,date_registered) VALUES ('$username','$pass','$email','$name','$surname','$telephone','$nif','$date_registered')";

                    //Guardamos en la variable $resultado la función que realiza la consulta a la BBDD con los parámetros de conexión a la BBDD y la sentencia que enviamos
                    $resultado = mysqli_query($con,$consulta);

                    //Si la operación de registro fue correcta, nos envía al formulario de login
                    if($resultado){

                        header("Location: formulario_login.html");  

                    }else{// Si no lo fue, nos lanza el mensaje de error
                        ?>
                        <h3 class="bad">Ups! parece que ha habido algún problema</h3>
                        <?php
                        die(mysqli_connect_error());
                    }
                }
        }else{//si al menos uno de los campos está vacío se muestra el siguiente mensaje
            ?>
            <h3 class="bad">Por favor, completa todos los campos</h3>
            <?php
        }
        //Cierra la conexión con la BBDD para evitar errores
        mysqli_close($con);
    }
?>