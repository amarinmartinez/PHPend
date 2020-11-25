<?php require_once 'includes/helpers.php'; ?>

<?php require_once 'includes/header.php';?>

<!-- MAIN BOX -->
<div id="main-box">    
    <div id="calendar-box">
    <?php
    require ("calendario.php");

    if ($_POST) {
    $mes = $_POST["nuevo_mes"];
    $ano = $_POST["nuevo_ano"];
    }elseif ($_GET){
    $mes = $_GET["nuevo_mes"];
    $ano = $_GET["nuevo_ano"];
    }else{
    $tiempo_actual = time();
    $mes = date("n", $tiempo_actual);
    $ano = date("Y", $tiempo_actual);
    }

    show_calendar($mes,$ano);
    formCalendar($mes,$ano);
    ?>
    </div>

</div>

<?php require_once 'includes/footer.php'; ?>