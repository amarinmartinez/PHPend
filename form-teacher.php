<?php 
    require_once 'includes/helpers.php'; 
    require_once 'includes/header-admin.php';
?>

<div id="main-box-2">
    <div class="contenedorFormulario">

    <!--Contenedor de los campos del formulario-->
    <form class="columna" action= "registro-prof.php" method="post">

        <!--Título del formulario-->
        <h2>Formulario de Alta de Profesor</h2>

        <!--Campos del formulario-->
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="surname" placeholder="Apellidos">
        <input type="text" name="telephone" placeholder="Teléfono">
        <input type="text" name="nif" placeholder="NIF">
        <input type="email" name="email" placeholder="Correo electrónico">
        <input type="submit" name="profregister">
    </form>
    </div>
</div>

<?php require_once 'includes/footer.php';?>