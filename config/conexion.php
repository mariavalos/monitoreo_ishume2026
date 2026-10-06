<?php
$HOST = "localhost";
$USER = "root";
$PASSWORD = "";
$DB = "monitoreo_avances_ishume2026";
$PORT = 3307;

$conexion = new mysqli(
    $HOST,
    $USER,
    $PASSWORD,
    $DB,
    $PORT
);

if ($conexion->connect_error) {
    die("Tu conexion es erronea: " . $conexion->connect_error);
}
?>