<?php 
    include 'includes/conexion.php';
    $id = $_GET["id"]; //obtenemos el ID del registro que queremos modificar desde el formulario de profesores.php
    $profesores = "SELECT * FROM teachers WHERE id_teacher='$id'"; //traemos solo el registro que queremos modificar y que coincide con el ID importado

    require_once 'includes/helpers.php';
    require_once 'includes/header-admin.php';
?>

<!-- MAIN BOX -->
<div id="main-box">  
    <div class="table_title">Edición de Datos de Profesores</div>
    <form class=container_table action="guarda-edit-prof.php" method="post">
        <div class="table_header">NOMBRE</div>
        <div class="table_header">APELLIDOS</div>
        <div class="table_header">TELÉFONO</div>
        <div class="table_header">NIF</div>
        <div class="table_header">EMAIL</div>
        <div class="table_header">OPERACIÓN</div>
        <?php
            $resultado = mysqli_query($db,$profesores);
            while($row=mysqli_fetch_assoc($resultado)){?>

                <input type="hidden" class="table_item" value="<?php echo $row["id_teacher"]?>" name="id">    
                <input type="text" class="table_item" value="<?php echo $row["name"]?>" name="name">
                <input type="text" class="table_item" value="<?php echo $row["surname"]?>" name="surname">
                <input type="text" class="table_item" value="<?php echo $row["telephone"]?>" name="telephone">
                <input type="text" class="table_item" value="<?php echo $row["nif"]?>" name="nif">
                <input type="text" class="table_item" value="<?php echo $row["email"]?>" name="email">
                <input type="submit" value="Guardar" class="table_submit">
            <?php }
        ?>
    </form>  
</div>
<?php require_once 'includes/footer.php'; ?>  
