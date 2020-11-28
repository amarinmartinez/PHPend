<?php
    
    require("includes/conexion.php");

    if(isset($_POST['cursoregister'])){

        if(strlen($_POST['name']) >= 1 &&
            strlen($_POST['description']) >= 1 &&
            strlen($_POST['date_start']) >= 1 &&
            strlen($_POST['date_end']) >= 1 &&
            strlen($_POST['active']) >= 1 ){

                $name = trim($_POST['name']);
                $description = trim($_POST['description']);
                $date_start = trim($_POST['date_start']);
                $date_end = trim($_POST['date_end']);
                $active = trim($_POST['active']);
                
                $nameRep = mysqli_query($db,"SELECT * from curses WHERE name = '$name'"); 
                $mr = mysqli_num_rows($nameRep);

                if($mr == 1){?>
                    <h3>El nombre introducido para el nuevo curso ya existe. Por favor, introduce uno distinto</h3><?php
                }

                if($mr == 0){
                    $consulta = "INSERT INTO courses(name,description,date_start,date_end,active) VALUES ('$name','$description','$date_start','$date_end','$active')";

                    $resultado = mysqli_query($db,$consulta);

                    if($resultado){

                        header("Location: cursos.php");  

                    }else{
                        ?>
                        <h3>Ups! parece que ha habido algún problema</h3>
                        <?php
                        die(mysqli_connect_error());
                    }
                }
        }else{
            ?>
            <h3 class="bad">Por favor, completa todos los campos</h3>
            <?php
        }
        mysqli_close($db);
    }
?>