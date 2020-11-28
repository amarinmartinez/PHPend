<?php 
    include 'includes/conexion.php';
    $id = $_GET["id"]; 
    $curso = "SELECT * FROM courses WHERE id_course='$id'";

    require_once 'includes/helpers.php';
    require_once 'includes/header-admin.php';
?>

<!-- MAIN BOX -->
<div id="main-box">  
    <div class="table_title">Edición de Datos de Cursos</div>
    <form class=container_table action="guarda-edit-curso.php" method="post">
        <div class="table_header">NOMBRE</div>
        <div class="table_header">DESCRIPCIÓN</div>
        <div class="table_header">FECHA INICIO</div>
        <div class="table_header">FECHA FIN</div>
        <div class="table_header">ACTIVO</div>
        <div class="table_header">OPERACIÓN</div>
        <?php
            $resultado = mysqli_query($db,$curso);
            while($row=mysqli_fetch_assoc($resultado)){?>

                <input type="hidden" class="table_item" value="<?php echo $row["id_course"]?>" name="id">    
                <input type="text" class="table_item" value="<?php echo $row["name"]?>" name="name">
                <input type="text" class="table_item" value="<?php echo $row["description"]?>" name="description">
                <input type="date" class="table_item" value="<?php echo $row["date_start"]?>" name="date_start">
                <input type="date" class="table_item" value="<?php echo $row["dedate_end"]?>" name="date_end">
                <input type="text" class="table_item" value="<?php echo $row["active"]?>" name="active">
                <input type="submit" value="Guardar" class="table_submit">
            <?php }
        ?>
    </form>  
</div>
<?php require_once 'includes/footer.php'; ?>  