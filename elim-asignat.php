<?php 
    include 'includes/conexion.php';
    $id = $_GET["id"];

    //Eliminamos los datos
    $eliminar = "DELETE FROM asignaturas WHERE id_asignatura='$id'";
    $resultado=mysqli_query($db, $eliminar);

    if($resultado){
        echo "<script>alert('El registro se ha eliminado correctamente'); window.location='asignaturas.php';</script>";
    }else{
        echo "<script>alert('El registro no ha sido borrado'); window.history.go(-1);</script>";
    }
?>  
