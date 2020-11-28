<?php 
    require_once 'includes/helpers.php'; 
    require_once 'includes/header-admin.php';
?>

<div id="main-box-2">
    <div class="contenedorFormulario">

    <!--Contenedor de los campos del formulario-->
    <form class="columna" action= "registro-curso.php" method="post">

        <!--Título del formulario-->
        <h2>Formulario de Alta de Curso</h2>

        <!--Campos del formulario-->
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="description" placeholder="Descripción">
        <input type="date" name="date_start" placeholder="Fecha de Inicio">
        <input type="date" name="date_end" placeholder="Fecha de Fin">
        <input type="text" name="active" placeholder="Activo">
        <input type="submit" name="cursoregister">
    </form>
    </div>
</div>

<?php require_once 'includes/footer.php';?>