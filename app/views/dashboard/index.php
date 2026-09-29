<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ISHUME 2026 - Monitoreo de Avances</title>
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/estilos.css">
</head>
<body>
    <h1>ISHUME</h1>
    <h2>Monitoreo de avances</h2>

    <!-- TARJETAS -->

    <div class="tarjetas">
        <div class="tarjeta">
            <h3>CANTIDAD DE ALUMNOS</h3>
            <p>
                <?php echo $total; ?>
            </p>
        </div>
        <div class="tarjeta">
            <h3>PENDIENTES</h3>
            <p>
                <?php echo $pendientes; ?>
            </p>
        </div>
        <div class="tarjeta">
            <h3>EN PROCESO</h3>
            <p>
                <?php echo $proceso; ?>
            </p>
        </div>
        <div class="tarjeta">
            <h3>COMPLETADOS</h3>
            <p>
                <?php echo $completados; ?>
            </p>
        </div>
    </div>
    <!-- BOTÓN AGREGAR -->
    <div class="boton-agregar">
       <a href="index.php?accion=agregar" class="btn-agregar">AGREGAR PRACTICANTE</a>
    </div>
    <!-- TABLA -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Teléfono</th>
                <th>Carrera</th>
                <th>Colegio</th>
                <th>Estado</th>
                <th>Fecha inicio</th>
                <th>Fecha límite</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($practicantes as $practicante): ?>
                <tr>
                    <td>
                        <?php echo $practicante['id']; ?>
                    </td>
                    <td>
                        <?php echo $practicante['nombres']; ?>
                    </td>
                    <td>
                        <?php echo $practicante['telefono']; ?>
                    </td>
                    <td>
                        <?php echo $practicante['carrera']; ?>
                    </td>
                    <td>
                        <?php echo $practicante['colegio']; ?>
                    </td>
                    <td>
                        <?php echo $practicante['estado']; ?>
                    </td>
                    <td>
                        <?php echo $practicante['fecha_inicio']; ?>
                    </td>
                    <td>
                        <?php echo $practicante['fecha_limite']; ?>
                    </td>
                    <td class="acciones">
                    <a href="app/views/dashboard/editar.php?id=<?php echo $practicante['id']; ?>" class="btn-editar">EDITAR</a>
                    
                    <a href="/monitoreo_ishume_2026/public/practicante/borrar?id=<?php echo $practicante['id']; ?>" 
                    class="btn-borrar"
                    onclick="return confirm('¿Seguro que deseas borrar este practicante?');">
                    BORRAR </a>    
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>