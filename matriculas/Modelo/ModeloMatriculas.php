<?php

require_once '../../conexion.php';

class Matriculas extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarInscripciones($paginationStart, $limit)
    {
        $listarInscripciones = null;
        $statement = $this->db->prepare("SELECT TI.*, TP.nombre AS 'programa',TE.telefono,TE.nombre as 'estudiante', case when TM.id_inscripcion is null then 0 else 1 end AS 'matriculado' FROM `tbl_inscripciones` AS TI
        INNER JOIN tbl_programas as TP on TP.id_programa=TI.id_programa
        INNER JOIN tbl_estudiantes AS TE ON TE.cc_estudiante=TI.cc_estudiante
        LEFT JOIN tbl_matriculas AS TM ON TM.id_inscripcion=TI.id_inscripcion
        ORDER BY TI.fecha desc LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarInscripciones[] = $consulta;
        }
        return $listarInscripciones;
    }

    public function contadorInscripciones()
    {
        $contadorInscripciones = null;
        $statement = $this->db->prepare("SELECT COUNT(id_inscripcion) as 'id' FROM tbl_inscripciones");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorInscripciones[] = $consulta;
        }
        return $contadorInscripciones;
    }

    public function MostrarInscripcionesById($id)
    {
        $MostrarInscripcionesById = null;
        $statement = $this->db->prepare("SELECT TI.*, TP.nombre AS 'programa',TE.nombre as 'estudiante' FROM `tbl_inscripciones` AS TI
        INNER JOIN tbl_programas as TP on TP.id_programa=TI.id_programa
        INNER JOIN tbl_estudiantes AS TE ON TE.cc_estudiante=TI.cc_estudiante
        WHERE TI.id_inscripcion=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $MostrarInscripcionesById[] = $consulta;
        }
        return $MostrarInscripcionesById;
    }

    public function listarClases()
    {
        $listarClases = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_clases WHERE estado = 1");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarClases[] = $consulta;
        }
        return $listarClases;
    }

    public function insertarMatricula($fecha, $id_inscripcion, $valorpago, $cedula, $selectClase)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_matriculas`(`valorpago`, `fechamatricula`, `id_inscripcion`, `id_clase`, `cc_profesor`) VALUES (:valorpago,:fecha,:id_inscripcion,:selectClase,:cedula)");
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':id_inscripcion', $id_inscripcion);
        $statement->bindParam(':valorpago', $valorpago);
        $statement->bindParam(':cedula', $cedula);
        $statement->bindParam(':selectClase', $selectClase);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
