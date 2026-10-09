<?php
require_once "../../config/conexion.php";
$id = (int) $_GET["id"];

$sql = "SELECT
            practicantes.*,
            colegios.nombre AS colegio,
            seguimiento.estado,
            seguimiento.fecha_inicio,
            seguimiento.fecha_limite,
            calificacion.calificacion_actual,
            calificacion.calificacion_desaprobatoria,
            calificacion.resultado
        FROM practicantes
        LEFT JOIN seguimiento
            ON practicantes.id = seguimiento.id_practicante
        LEFT JOIN sesion
            ON seguimiento.id_sesion = sesion.id_sesion
        LEFT JOIN colegios
            ON sesion.id_colegio = colegios.id_colegio
        LEFT JOIN calificacion
            ON seguimiento.id_calificacion = calificacion.id_calificacion
        WHERE practicantes.id = $id";

$resultado = $conexion->query($sql);
$practicante = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETALLE DE LOS PRACTICANTES</title>
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/configuracion.css">
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/menu.css">
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/dashboard.css">
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/detalle.css">
</head>
<body>
    <div class="contenedor">
        <aside class="menu">
            <div class="logo">
                <img src="/monitoreo_ishume_2026/public/image/logo.png" alt="logo ISHUME">
            </div>
            <nav>
                <a href="/monitoreo_ishume_2026/" class="activo">Inicio</a>
                <a href="#">Practicantes</a>
                <a href="#">Seguimiento</a>
                <a href="#">Sesiones</a>
                <a href="#">Colegios</a>
                <a href="#">Materiales</a>
            </nav>
        </aside>
        <main class="contenido">
            <a href="/monitoreo_ishume_2026/" class="volver">
                <- Volver a practicantes
            </a>
            <div class="titulo-detalle">
                <h1>DETALLE DEL PRACTICANTE</h1>
            </div>
            <div class="detalle-contenido">
                <section class="tarjeta-detalle informacion-personal">
                    <div class="titulo-tarjeta">
                        <h2>INFORMACION PERSONAL</h2>
                        <span class="estado-detalle">- ACTIVO</span>
                    </div>
                    <div class="dato">
                        <span>DNI</span>
                        <strong><?php echo $practicante['DNI']; ?></strong>
                    </div>
                    <div class="dato">
                        <span>Nombres</span>
                        <strong><?php echo $practicante['nombres']; ?></strong>
                    </div>
                    <div class="dato">
                        <span>Apellidos</span>
                        <strong><?php echo $practicante['apellidos']; ?></strong>
                    </div>
                    <div class="dato">
                        <span>Telefono</span>
                        <strong><?php echo $practicante['telefono']; ?></strong>
                    </div>
                    <div class="dato">
                        <span>Carrera</span>
                        <strong><?php echo $practicante['carrera']; ?></strong>
                    </div>
                </section>
                <section>
                    <div class="informacion-lateral">
                        <section class="tarjeta-detalle tarjeta-pequena">
                            <h2>COLEGIO</h2>
                            <strong><?php echo $practicante['colegio'] ?? "Sin colegio asignado";?></strong>
                        </section>
                        <section class="tarjeta-detalle tarjeta-pequena">
                            <h2>SEGUIMIENTO</h2>
                            <strong><?php echo $practicante['estado'];?></strong>
                            <p>Limite: <?php echo $practicante['fecha_limite'];?></p>
                        </section>
                        <section class="tarjeta-detalle tarjeta-pequena">
                            <h2>CALIFICACION</h2>
                            <div class="calificacion"><?php echo $practicante['calificacion_actual'];?></div>
                            <p>Nota minima: 10.5</p>
                        </section>
                    </div>
                </section>
            </div>
            <div class="acciones-detalle">
                <a href="#" class="btn-editar-detalle">EDITAR INFORMACION</a>
                <a href="#" class="btn-eliminar-detalle">ELIMINAR</a>
            </div>
        </main>
    </div>
</body>
</html>  