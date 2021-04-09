<?php
    $dbhost ='localhost';
    $dbname = 'dbyana';
    $dbuser = 'dbyana';
    $dbpass = 'dbyana';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) 
    or die("Failed to connect to MySQL: ".mysqli_error());
    $connect -> query ("SET NAMES 'utf8'");
    #Con la conexión podemos lanzar consultas.
?>