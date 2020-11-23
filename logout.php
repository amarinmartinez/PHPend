<?php

    //Se inicia sesión para poder cerrarla y se redirige a la página de inicio
    session_start();
    session_destroy();
    header("location: index.html");

?>