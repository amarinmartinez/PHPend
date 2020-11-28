<?php 
    include 'includes/conexion.php';

    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $numHoras=$_POST['numHoras'];
    $id_teacher=$_POST['id_teacher'];
    $description=$_POST['description'];
    $color=$_POST['color'];

    //Modificamos los datos
    $editar = "UPDATE asignaturas SET name='$name', numHoras='$numHoras', id_teacher='$id_teacher', description='$description', color='$color' WHERE id_asignatura='$id'";
    $resultado=mysqli_query($db, $editar);

    if($resultado){
        echo "<script>alert('Se han guardado los cambios correctamente'); window.location='asignaturas.php';</script>";
    }else{
        echo "<script>alert('Los cambios no se han guardado correctamente'); window.history.go(-1);</script>";
    }

?>  