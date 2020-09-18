<?php
require_once "global.php";

$conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME );
mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

if (mysqli_connect_errno())
{
    printf("Fallo conexion a la base de datos: %s\n", mysqli_connect_errno());
    exit();
}