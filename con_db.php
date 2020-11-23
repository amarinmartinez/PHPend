<?php 

   //variables que almacenan los párametros de conexión con la BBDD
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "root";
   $dbname = "horarioapp";

   //Variable que almacena la función y sus parámetros de conexión con la BBDD
   $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    
?>