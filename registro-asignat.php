
    <?php
    
    //Enlace con el archivo que conecta con la BBDD y el de funciones almacenadas
    require("includes/conexion.php");

    //Se ejecuta el bloque solo si se ha pulsado el botón del formulario de registro de profesor
    if(isset($_POST['asignatregister'])){

        //Se ejecuta el bloque solo si todos los campos contienen al menos un caracter
        if(strlen($_POST['name']) >= 1 &&
            strlen($_POST['numHoras']) >= 1 &&
            strlen($_POST['id_teacher']) >= 1 &&
            strlen($_POST['description']) >= 1 &&
            strlen($_POST['color']) >= 1 ){

                //Guardamos en variables el contenido de los campos de formulario, usando la función trim para eliminar posibles espacios delante y/o detrás de los caracteres
                $name = trim($_POST['name']);
                $numHoras = trim($_POST['numHoras']);
                $id_teacher = trim($_POST['id_teacher']);
                $description = trim($_POST['description']);
                $color = trim($_POST['color']);
                    
                //realizamos la consulta en busca de coincidencias
                $nameRep = mysqli_query($db,"SELECT * from asignaturas WHERE name = '$name'"); 
                $mr = mysqli_num_rows($nameRep);

                if($mr == 1){?>
                    <h3>El nombre introducido para la nueva asignatura ya existe. Por favor, introduce uno distinto</h3><?php
                }

                //El bloque se ejecuta si no hay coincidencias en la consulta
                if($mr == 0){

                    //Guardamos en la variable $consulta la sentencia que introduce los valores en cada campo de la tabla
                    $consulta = "INSERT INTO asignaturas(name,numHoras,id_teacher,description,color) VALUES ('$name','$numHoras','$id_teacher','$description','$color')";

                    //Guardamos en la variable $resultado la función que realiza la consulta a la BBDD con los parámetros de conexión a la BBDD y la sentencia que enviamos
                    $resultado = mysqli_query($db,$consulta);

                    //Si la operación de registro fue correcta, nos envía a la panalla de asignaturas
                    if($resultado){

                        header("Location: asignaturas.php");  

                    }else{// Si no lo fue, nos lanza el mensaje de error
                        ?>
                        <h3>Ups! parece que ha habido algún problema</h3>
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
        mysqli_close($db);
    }
?>