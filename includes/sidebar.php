<?php require_once 'includes/helpers.php'; ?>

<!-- SIDEBAR -->
<aside id="sidebar">
    <div id="login" class="block-aside">
        <h3>Login</h3>            
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password">

            <input type="submit" value="Entrar">                    
        </form>
    </div>

    <div id="register" class="block-aside">

        <h3>Registrarse</h3> 

        <!-- Mostrar errores -->
        <?php if(isset($_SESSION['completado'])): ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado']; ?>
            </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores'] ['general']; ?>
            </div>            
        <?php endif; ?>

        <form action="register.php" method="POST"> 
            <label for="name">Nombre</label>
            <input type="text" name="nombre" />
            <?php echo isset($_SESSION['errores']) ? showError($_SESSION['errores'], 'nombre') : ''; ?> <!-- En el caso que exista, muestra mensaje de error -->

            <label for="surnames">Apellidos</label>
            <input type="text" name="apellidos" />
            <?php echo isset($_SESSION['errores']) ? showError($_SESSION['errores'], 'apellidos') : ''; ?>

            <label for="email">Email</label>
            <input type="email" name="email" />
            <?php echo isset($_SESSION['errores']) ? showError($_SESSION['errores'], 'email') : ''; ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password" />
            <?php echo isset($_SESSION['errores']) ? showError($_SESSION['errores'], 'password') : ''; ?>

            <input type="submit" name="submit" value="Registrar" />
        </form>
        <?php deleteErrors(); ?>
    </div>
</aside>