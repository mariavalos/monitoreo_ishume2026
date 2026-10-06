<?php

require_once "config/conexion.php";

$sql = "SELECT * FROM practicantes";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    while ($fila = $resultado->fetch_assoc()) {

        echo "ID: " . $fila["id"] . "<br>";
        echo "DNI: " . $fila["DNI"] . "<br>";
        echo "Nombres: " . $fila["nombres"] . "<br>";
        echo "Apellidos: " . $fila["apellidos"] . "<br>";
        echo "Teléfono: " . $fila["telefono"] . "<br>";
        echo "Carrera: " . $fila["carrera"] . "<br>";

        echo "-------------------------<br>";
    }

} else {

    echo "No hay practicantes registrados.";

}

?>