<?php

require '../../conexion.php';

class Asisestudiante extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarAsisestudiantePagination($paginationStart, $limit)
    {
        $listarAsisestudiantePagination = null;
        $statement = $this->db->prepare("SELECT TC.grupo,TC.numeroclases,E.nombre,TAE.id_asisestudiante, TAE.cc_estudiante,
        TAE.id_clase,max(TAE.fecha) as 'fecha',SUM(TAE.asistencia) as 'asistencia' FROM tbl_asisestudiantes as TAE
        INNER JOIN tbl_clases AS TC ON TC.id_clase=TAE.id_clase
        INNER JOIN tbl_estudiantes AS E ON E.cc_estudiante=TAE.cc_estudiante WHERE TC.estado = 1
        GROUP BY TAE.id_clase,E.cc_estudiante desc LIMIT $paginationStart, $limit;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarAsisestudiantePagination[] = $consulta;
        }
        return $listarAsisestudiantePagination;
    }

    public function contadorAsisestudiante()
    {
        $contadorAsisestudiante = null;
        $statement = $this->db->prepare("SELECT TC.grupo,TC.numeroclases,E.nombre,TAE.id_asisestudiante, TAE.cc_estudiante,
        TAE.id_clase,max(TAE.fecha) as 'fecha',SUM(TAE.asistencia) as 'asistencia' FROM tbl_asisestudiantes as TAE
        INNER JOIN tbl_clases AS TC ON TC.id_clase=TAE.id_clase
        INNER JOIN tbl_estudiantes AS E ON E.cc_estudiante=TAE.cc_estudiante WHERE TC.estado = 1
        GROUP BY TAE.id_clase,E.cc_estudiante");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorAsisestudiante[] = $consulta;
        }
        return $contadorAsisestudiante;
    }

    public function insertarAsisestudiante($cc_estudiante, $id_clase, $fecha, $asistencia)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_asisestudiantes`(`cc_estudiante`, `id_clase`, `fecha`, `asistencia`) VALUES (:cc_estudiante,:id_clase,:fecha,:asistencia)");
        $statement->bindParam(':cc_estudiante', $cc_estudiante);
        $statement->bindParam(':id_clase', $id_clase);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':asistencia', $asistencia);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
