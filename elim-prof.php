<?php 
    include 'includes/conexion.php';
    $id = $_GET["id"]; //obtenemos el ID del registro que queremos modificar desde el formulario de profesores.php

    //Eliminamos los datos
    $eliminar = "DELETE FROM `teachers` WHERE id_teacher='$id'";
    $resultado=mysqli_query($db, $eliminar);

    if($resultado){
        echo "<script>alert('El registro se ha eliminado correctamente'); window.location='profesores.php';</script>";
    }else{
        echo "<script>alert('El registro no ha sido borrado'); window.history.go(-1);</script>";
    }
?>  

