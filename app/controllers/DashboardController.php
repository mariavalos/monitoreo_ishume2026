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

        while ($fila = $resultado->fetch_assoc()) {
            $practicantes[] = $fila;
        }
        //total de practicantes
        $sqlTotal= "SELECT COUNT(*) AS total FROM practicantes";
        $resultadoTotal = $conexion->query($sqlTotal);
        $filaTotal = $resultadoTotal->fetch_assoc();
        $total = $filaTotal["total"];

        //total de practicantes pendientes
        $sqlPendientes = "SELECT COUNT(*) AS pendientes
                          FROM seguimiento
                          WHERE estado = 'PENDIENTE'";
        
        $resultadoPendientes = $conexion->query($sqlPendientes);
        $filaPendientes = $resultadoPendientes->fetch_assoc();
        $pendientes = $filaPendientes["pendientes"];

        //total en procesos
        $sqlProceso = "SELECT COUNT(*) AS proceso
                       FROM seguimiento
                       WHERE estado = 'EN PROCESO'";

        $resultadoProceso = $conexion->query($sqlProceso);
        $filaProceso = $resultadoProceso->fetch_assoc();
        $proceso = $filaProceso["proceso"];

        //total completados
        $sqlCompletados = "SELECT COUNT(*) AS completados
                          FROM seguimiento
                          WHERE estado = 'COMPLETADO'";
        
        $resultadoCompletados = $conexion->query($sqlCompletados);
        $filaCompletados = $resultadoCompletados->fetch_assoc();
        $completados = $filaCompletados["completados"];

        require_once "app/views/dashboard.php";
    }
}
?>