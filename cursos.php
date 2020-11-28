<?php 
    include 'includes/conexion.php';
    $curso = "SELECT * FROM courses";

    require_once 'includes/helpers.php';
    require_once 'includes/header-admin.php';
?>

<!-- MAIN BOX -->
<div id="main-box">  
    <button class="boton"><a href="form-curso.php">+Curso</a></button>
    <div class="table_title">Datos de Asignaturas</div>
    <div class=container_table>
        <div class="table_header">NOMBRE</div>
        <div class="table_header">DESCRIPCIÓN</div>
        <div class="table_header">FECHA INICIO</div>
        <div class="table_header">FECHA FIN</div>
        <div class="table_header">ACTIVO</div>
        <div class="table_header">OPERACIÓN</div>
        <?php
            $resultado = mysqli_query($db,$curso);
            while($row=mysqli_fetch_assoc($resultado)){?>
        
                <div class="table_item"><?php echo $row["name"]?></div>
                <div class="table_item"><?php echo $row["description"]?></div>
                <div class="table_item"><?php echo $row["date_start"]?></div>
                <div class="table_item"><?php echo $row["date_end"]?></div>
                <div class="table_item"><?php echo $row["active"]?></div>
                <div class="table_item">
                    <a href="edit-curso.php?id=<?php echo $row["id_course"];?>" class="table_item_link">Editar</a> |
                    <a href="elim-curso.php?id=<?php echo $row["id_course"];?>" class="table_item_link">Eliminar</a>
                </div>
            <?php }

            mysqli_free_result($resultado);
        ?>
    </div>  
</div>
<?php require_once 'includes/footer.php'; ?>  