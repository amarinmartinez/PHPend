<?php 
    include 'includes/conexion.php';

    //Importamos los datos que provienen de edit-prof.php
    $id=$_POST['id'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $telephone=$_POST['telephone'];
    $nif=$_POST['nif'];
    $email=$_POST['email'];

    //Modificamos los datos
    $editar = "UPDATE teachers SET name='$name', surname='$surname', telephone='$telephone', nif='$nif', email='$email' WHERE id_teacher='$id'";
    $resultado=mysqli_query($db, $editar);

    if($resultado){
        echo "<script>alert('Se han guardado los cambios correctamente'); window.location='profesores.php';</script>";
    }else{
        echo "<script>alert('Los cambios no se han guardado correctamente'); window.history.go(-1);</script>";
    }

?>  
