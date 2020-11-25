<?php require_once 'includes/helpers.php'; ?>

<?php require_once 'includes/header.php';?>

<?php if(isset($_SESSION['student'])): ?> <!-- Si existe el usuario identificado -->        
    <div id="usuario-logueado" class="block-aside">
        <a href="create-post.php" class="boton boton-verde">Crear entradas</a>
        <a href="create-category.php" class="boton">Crear categoría</a>
        <a href="mydata.php" class="boton boton-naranja">Mis datos</a>

    </div>
<?php endif; ?>

<div id="main-box-2">
    <?php if(!isset($_SESSION['student'])): ?> <!-- Si NO existe el usuario identificado --> 
    <div id="login" class="block-aside">
        <h3>Identifícate</h3>

        <?php if(isset($_SESSION['error_login'])): ?> <!-- Si existe el usuario identificado -->  
            <div class="alerta alerta-error"> 
                <?=$_SESSION['error_login']; ?>
            </div>
        <?php endif; ?>
            
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password">

            <input type="submit" value="Entrar">                    
        </form>
    </div>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php';?>