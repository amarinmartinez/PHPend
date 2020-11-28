<?php 
    include 'includes/conexion.php';
    $id = $_GET["id"]; 
    $asignatura = "SELECT * FROM asignaturas WHERE id_asignatura='$id'"; //traemos solo el registro que queremos modificar y que coincide con el ID importado

    require_once 'includes/helpers.php';
    require_once 'includes/header-admin.php';
?>

<!-- MAIN BOX -->
<div id="main-box">  
    <div class="table_title">Edición de Datos de Asignaturas</div>
    <form class=container_table action="guarda-edit-asignat.php" method="post">
        <div class="table_header">NOMBRE</div>
        <div class="table_header">Nº HORAS</div>
        <div class="table_header">PROFESOR</div>
        <div class="table_header">DESCRIPCIÓN</div>
        <div class="table_header">COLOR</div>
        <div class="table_header">OPERACIÓN</div>
        <?php
            $resultado = mysqli_query($db,$asignatura);
            while($row=mysqli_fetch_assoc($resultado)){?>

                <input type="hidden" class="table_item" value="<?php echo $row["id_asignatura"]?>" name="id">    
                <input type="text" class="table_item" value="<?php echo $row["name"]?>" name="name">
                <input type="text" class="table_item" value="<?php echo $row["numHoras"]?>" name="numHoras">
                <input type="text" class="table_item" value="<?php echo $row["id_teacher"]?>" name="id_teacher">
                <input type="text" class="table_item" value="<?php echo $row["description"]?>" name="description">
                <input type="text" class="table_item" value="<?php echo $row["color"]?>" name="color">
                <input type="submit" value="Guardar" class="table_submit">
            <?php }
        ?>
    </form>  
</div>
<?php require_once 'includes/footer.php'; ?>  