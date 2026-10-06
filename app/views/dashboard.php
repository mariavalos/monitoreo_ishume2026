<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISHUME 2026 - Monitoreo de Avances</title>

    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/configuracion.css">
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/menu.css">
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/dashboard.css">
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/tarjetas.css">
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/tablas.css">
</head>
<body>
    <div class="contenedor">
        <aside class="menu">
            <div class="logo">
                <img src="/monitoreo_ishume_2026/public/image/logo.png" alt="Logo ISHUME">
            </div>
            <nav>
                <a href="#" class="activo">Inicio</a>
                <a href="#">Practicantes</a>
                <a href="#">Seguimiento</a>
                <a href="#">Sesiones</a>
                <a href="#">Colegios</a>
                <a href="#">Materiales</a>
            </nav>
        </aside>
        <main class="contenido">
            <div class="titulo">
                <h1>ISHUME 2026</h1>
                <p>Monitoreo de Avances</p>
            </div>
            <section class="seccion-dashboard">
                <h2>Resumen</h2>
                <div class="tarjetas">
                    <div class="tarjeta">
                        <h3>PRACTICANTES</h3>
                        <div class="numero">
                            <?php echo $total; ?>
                        </div>
                    </div>
                    <div class="tarjeta">
                        <h3>PENDIENTES</h3>
                        <div class="numero">
                            <?php echo $pendientes; ?>
                        </div>
                    </div>
                    <div class="tarjeta">
                        <h3>EN PROCESO</h3>
                        <div class="numero">
                            <?php echo $proceso; ?>
                        </div>
                    </div>
                    <div class="tarjeta">
                        <h3>COMPLETADOS</h3>
                        <div class="numero">
                            <?php echo $completados; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Practicantes recientes-->
             <section class="seccion-dashboard">
                <div class="encabezado-tabla">
                    <h2>Practicantes recientes</h2>
                    <a href="/monitoreo_ishume_2026/app/views/agregar_practicante.php" 
                    class="btn-agregar">+ AGREGAR PRACTICANTE</a>
                </div>
                <div class="tabla-contenedor">
                    <table class="tabla-practicantes">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>NOMBRES</th>
                                <th>APELLIDOS</th>
                                <th>CARRERA</th>
                                <th>ESTADO</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($practicantes as $practicante): ?>
                                <tr>
                                    <td>
                                        <?php echo $practicante["DNI"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $practicante["nombres"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $practicante["apellidos"]; ?>
                                    </td>
                                    <td>
                                         <?php echo $practicante["carrera"]; ?>
                                    </td>
                                    <td>
                                        <span class="estado">
                                            <?php echo $practicante["estado"]; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-ver">VER -></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
             </section>
        </main>
    </div>
</body>
</html>