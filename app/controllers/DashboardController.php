<?php

class DashboardController
{
    public function index()
    {
        require_once "config/conexion.php";

        $sql = "SELECT
                practicantes.id,
                practicantes.DNI,
                practicantes.nombres,
                practicantes.apellidos,
                practicantes.telefono,
                practicantes.carrera,
                colegios.nombre AS colegio,
                seguimiento.estado,
                seguimiento.fecha_inicio,
                seguimiento.fecha_limite
            FROM practicantes
            LEFT JOIN seguimiento
                ON practicantes.id = seguimiento.id_practicante
            LEFT JOIN sesion
                ON seguimiento.id_sesion = sesion.id_sesion
            LEFT JOIN colegios
                ON sesion.id_colegio = colegios.id_colegio
            ORDER BY practicantes.id ASC";

        $resultado = $conexion->query($sql);

        $practicantes = [];

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $practicantes[] = $fila;
            }
        }

        $total = count($practicantes);

        $pendientes = 0;
        $proceso = 0;
        $completados = 0;

        foreach ($practicantes as $practicante) {

            if ($practicante['estado'] == 'PENDIENTE') {
                $pendientes++;
            } elseif ($practicante['estado'] == 'EN PROCESO') {
                $proceso++;
            } elseif ($practicante['estado'] == 'COMPLETADO') {
                $completados++;
            }
        }

        require_once "app/views/dashboard/index.php";
    }


    public function agregar()
    {
        require_once "config/conexion.php";
        require_once "app/models/practicantes.php";

        $practicante = new Practicante($conexion);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $DNI = $_POST['DNI'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $carrera = $_POST['carrera'];

            $practicante->agregar(
                $DNI,
                $nombres,
                $apellidos,
                $telefono,
                $carrera
            );

            header("Location: index.php");
            exit;
        }

        require_once "app/views/dashboard/agregar.php";
    }


    // EDITAR PRACTICANTE
    public function editar()
    {
        require_once "config/conexion.php";
        require_once "app/models/practicantes.php";

        $practicanteModelo = new Practicante($conexion);

        $id = $_GET['id'];

        $practicante = $practicanteModelo->obtenerPorId($id);

        require_once "app/views/dashboard/editar.php";
    }
}

?>