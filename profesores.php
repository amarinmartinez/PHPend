<?php 
    include 'includes/conexion.php';
    $profesores = "SELECT * FROM teachers";

    require_once 'includes/helpers.php';
    require_once 'includes/header-admin.php';
?>

<!-- MAIN BOX -->
<div id="main-box">  
    <button class="boton"><a href="form-teacher.php">+Profesor</a></button>
    <div class="table_title">Datos de Profesores</div>
    <div class=container_table>
        <div class="table_header">NOMBRE</div>
        <div class="table_header">APELLIDOS</div>
        <div class="table_header">TELÉFONO</div>
        <div class="table_header">NIF</div>
        <div class="table_header">EMAIL</div>
        <div class="table_header">OPERACIÓN</div>
        <?php
            $resultado = mysqli_query($db,$profesores);
            while($row=mysqli_fetch_assoc($resultado)){?>
        
                <div class="table_item"><?php echo $row["name"]?></div>
                <div class="table_item"><?php echo $row["surname"]?></div>
                <div class="table_item"><?php echo $row["telephone"]?></div>
                <div class="table_item"><?php echo $row["nif"]?></div>
                <div class="table_item"><?php echo $row["email"]?></div>
                <div class="table_item">
                    <a href="edit-prof.php?id=<?php echo $row["id_teacher"];?>" class="table_item_link">Editar</a> |
                    <a href="elim-prof.php?id=<?php echo $row["id_teacher"];?>" class="table_item_link">Eliminar</a>
                </div>
            <?php }

            mysqli_free_result($resultado);
        ?>
    </div>  
</div>
<?php require_once 'includes/footer.php'; ?>  
