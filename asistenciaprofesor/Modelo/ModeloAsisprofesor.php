<?php

require '../../conexion.php';

class Asisprofesor extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarAsisprofesorPagination($paginationStart, $limit)
    {
        $listarProfesoresPagination = null;
        $statement = $this->db->prepare("SELECT TC.grupo,TC.numeroclases,P.nombre,TAP.id_asisprofesor, TAP.cc_profesor,
        TAP.id_clase,max(TAP.fecha) as 'fecha',SUM(TAP.asistencia) as 'asistencia' FROM `tbl_asisprofesores` as TAP
        INNER JOIN tbl_clases AS TC ON TC.id_clase=TAP.id_clase
        INNER JOIN tbl_profesores AS P ON P.cc_profesor=TAP.cc_profesor WHERE TC.estado = 1
        GROUP BY TC.id_clase, P.cc_profesor desc LIMIT $paginationStart, $limit;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarProfesoresPagination[] = $consulta;
        }
        return $listarProfesoresPagination;
    }

    public function contadorAsisprofesor()
    {
        $contadorProfesores = null;
        $statement = $this->db->prepare("SELECT Count(id_asisprofesor) as 'id' FROM tbl_asisprofesores");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorProfesores[] = $consulta;
        }
        return $contadorProfesores;
    }

    public function insertarAsisprofesor($id_clase, $cc_profesor, $fecha, $asistencia)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_asisprofesores`(`id_clase`, `cc_profesor`, `fecha`, `asistencia`) VALUES (:id_clase,:cc_profesor,:fecha,:asistencia)");
        $statement->bindParam(':id_clase', $id_clase);
        $statement->bindParam(':cc_profesor', $cc_profesor);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':asistencia', $asistencia);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
