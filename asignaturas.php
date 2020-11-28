<?php 
    include 'includes/conexion.php';
    $asignatura = "SELECT * FROM asignaturas";

    require_once 'includes/helpers.php';
    require_once 'includes/header-admin.php';
?>

<!-- MAIN BOX -->
<div id="main-box">  
    <button class="boton"><a href="form-asignat.php">+Asignatura</a></button>
    <div class="table_title">Datos de Asignaturas</div>
    <div class=container_table>
        <div class="table_header">NOMBRE</div>
        <div class="table_header">Nº HORAS</div>
        <div class="table_header">PROFESOR</div>
        <div class="table_header">DESCRIPCIÓN</div>
        <div class="table_header">COLOR</div>
        <div class="table_header">OPERACIÓN</div>
        <?php
            $resultado = mysqli_query($db,$asignatura);
            while($row=mysqli_fetch_assoc($resultado)){?>
        
                <div class="table_item"><?php echo $row["name"]?></div>
                <div class="table_item"><?php echo $row["numHoras"]?></div>
                <div class="table_item"><?php echo $row["id_teacher"]?></div>
                <div class="table_item"><?php echo $row["description"]?></div>
                <div class="table_item"><?php echo $row["color"]?></div>
                <div class="table_item">
                    <a href="edit-asignat.php?id=<?php echo $row["id_asignatura"];?>" class="table_item_link">Editar</a> |
                    <a href="elim-asignat.php?id=<?php echo $row["id_asignatura"];?>" class="table_item_link">Eliminar</a>
                </div>
            <?php }

            mysqli_free_result($resultado);
        ?>
    </div>  
</div>
<?php require_once 'includes/footer.php'; ?>  