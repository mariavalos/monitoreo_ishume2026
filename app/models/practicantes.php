<?php



class Practicante
{
    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    public function obtenerTodos()
    {
        $sql = "SELECT 
                    practicantes.id,
                    CONCAT(practicantes.nombres, ' ', practicantes.apellidos) AS practicante,
                    practicantes.telefono,
                    practicantes.carrera,
                    calificacion.calificacion_actual,
                    seguimiento.estado,
                    seguimiento.fecha_limite
                FROM practicantes
                LEFT JOIN seguimiento
                    ON practicantes.id = seguimiento.id_practicante
                LEFT JOIN calificacion
                    ON seguimiento.id_calificacion = calificacion.id_calificacion
                ORDER BY practicantes.id ASC";

        $consulta = $this->conexion->query($sql);

        $datos = [];

        if ($consulta) {
            while ($fila = $consulta->fetch_assoc()) {
                $datos[] = $fila;
            }
        }

        return $datos;
    }

    public function agregar($DNI, $nombres, $apellidos, $telefono, $carrera)
    {
        $sql = "INSERT INTO practicantes 
                (DNI, nombres, apellidos, telefono, carrera)
                VALUES 
                ('$DNI', '$nombres', '$apellidos', '$telefono', '$carrera')";

        return $this->conexion->query($sql);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM practicantes WHERE id = $id";

        $consulta = $this->conexion->query($sql);

        return $consulta->fetch_assoc();
    }

    public function editar($id, $nombres, $telefono, $carrera, $colegio, $estado, $fecha_inicio, $fecha_limite)
    {
        $sql = "UPDATE practicantes SET
                    nombres = '$nombres',
                    telefono = '$telefono',
                    carrera = '$carrera',
                    colegio = '$colegio'
                    estado = '$estado',
                    fecha_inicio = '$fecha_inicio',
                    fecha_limite = '$fecha_limite'
                WHERE id = $id";

        return $this->conexion->query($sql);
    }

    public function borrar($id)
    {
        $sql = "DELETE FROM practicantes WHERE id = $id";

        return $this->conexion->query($sql);
    }
}
?>