<?php 
    require_once 'includes/helpers.php'; 
    require_once 'includes/header-admin.php';
?>

<div id="main-box-2">
    <div class="contenedorFormulario">

    <!--Contenedor de los campos del formulario-->
    <form class="columna" action= "registro-asignat.php" method="post">

        <!--Título del formulario-->
        <h2>Formulario de Alta de Asignatura</h2>

        <!--Campos del formulario-->
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="numHoras" placeholder="Nº de horas">
        <input type="text" name="id_teacher" placeholder="ID del Profesor">
        <input type="text" name="description" placeholder="Descripción corta">
        <input type="text" name="color" placeholder="Color">
        <input type="submit" name="asignatregister">
    </form>
    </div>
</div>

<?php require_once 'includes/footer.php';?>