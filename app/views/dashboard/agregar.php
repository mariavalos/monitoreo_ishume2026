<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar practicantes - ISHUME</title>
    <link rel="stylesheet" href="/monitoreo_ishume_2026/public/css/estilos.css">
</head>
<body>
    <h1>ISHUME</h1>
    <h2>Agregar practicantes</h2>
    <form method="POST">
        <label>Nombres</label>
        <input type="text" name="nombres" id="nombres"> <br>
        <br>
        <label>Teléfono</label>
        <input type="text" name="telefono" id="telefono"> <br>
        <br>
        <label>Carrera</label>
        <input type="text" name="carrera" id="carrera"> <br>
        <br>
        <label>Colegio</label>
        <input type="text" name="colegio" id="colegio"> <br>
        <br>
        <label>Estado</label>
        <input type="text" name="estado" id="estado"> <br>
        <br>
        <label>Fecha Inicio</label>
        <input type="text" name="fecha_inicio" id="fecha_inicio"> <br>
        <br>
        <label>Fecha limito</label>
        <input type="text" name="fecha_limite" id="fecha_limite"> <br>
        <br>
        <button type="submit">Agregar Practicante</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>