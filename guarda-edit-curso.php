<?php 
    include 'includes/conexion.php';

    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $date_start=$_POST['date_start'];
    $date_end=$_POST['date_end'];
    $active=$_POST['active'];

    //Modificamos los datos
    $editar = "UPDATE courses SET name='$name', description='$description', date_start='$date_start', date_end='$date_end', active='$active' WHERE id_course='$id'";
    $resultado=mysqli_query($db, $editar);

    if($resultado){
        echo "<script>alert('Se han guardado los cambios correctamente'); window.location='cursos.php';</script>";
    }else{
        echo "<script>alert('Los cambios no se han guardado correctamente'); window.history.go(-1);</script>";
    }

?>  