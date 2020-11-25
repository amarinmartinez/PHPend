<?php
session_start();

if(isset($_SESSION['student'])){
    session_destroy();    
}

header("Location: index.php");