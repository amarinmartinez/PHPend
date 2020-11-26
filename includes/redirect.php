<?php

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION['student'])){
    header("Location: index.php");
}else if (!isset($_SESSION['admin'])){
    header("Location: index.php");
}