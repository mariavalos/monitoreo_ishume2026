<?php
$HOST = "localhost";
$USER = "root";
$PASSWORD = "";
$BD = "monitoreo_avances_ishume2026";
$PORT = 3307;

$conexion = new mysqli(
    $HOST, 
    $USER, 
    $PASSWORD, 
    $BD, 
    $PORT);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>