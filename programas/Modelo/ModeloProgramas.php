<?php
require_once '../../conexion.php';

class Programas extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarProgramas($paginationStart, $limit)
    {
        $listarProgramas = null;
        $statement = $this->db->prepare("SELECT TP.*, TS.nombre AS 'nombreSede',TE.escuela FROM tbl_programas as TP
        INNER JOIN tbl_sedes AS TS ON TS.id_sede = TP.id_sede
        INNER JOIN tbl_escuelas AS TE ON TE.id_escuela = TP.id_escuela ORDER BY TP.nombre  desc LIMIT $paginationStart, $limit;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarProgramas[] = $consulta;
        }
        return $listarProgramas;
    }

    public function contadorProgramas()
    {
        $contadorInscripciones = null;
        $statement = $this->db->prepare("SELECT COUNT(id_programa) as 'id' FROM tbl_programas");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorInscripciones[] = $consulta;
        }
        return $contadorInscripciones;
    }

    public function listarEscuela()
    {
        $listarEscuela = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_escuelas");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarEscuela[] = $consulta;
        }
        return $listarEscuela;
    }

    public function MostrarProgramaPorId($programa)
    {
        $MostrarProgramaPorId = null;
        $statement = $this->db->prepare("SELECT TP.*, TS.nombre AS 'nombreSede',TE.escuela FROM tbl_programas as TP
        INNER JOIN tbl_sedes AS TS ON TS.id_sede = TP.id_sede
        INNER JOIN tbl_escuelas AS TE ON TE.id_escuela = TP.id_escuela
        WHERE TP.id_programa=:programa");
        $statement->bindParam(':programa', $programa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $MostrarProgramaPorId[] = $consulta;
        }
        return $MostrarProgramaPorId;
    }

    public function listarProgramasPorEscuela($escuela)
    {
        $listarProgramasPorEscuela = null;
        $statement = $this->db->prepare("SELECT TP.*, TS.nombre AS 'nombreSede',TE.escuela FROM tbl_programas as TP
        INNER JOIN tbl_sedes AS TS ON TS.id_sede = TP.id_sede
        INNER JOIN tbl_escuelas AS TE ON TE.id_escuela = TP.id_escuela
        WHERE TP.estado=1 AND TP.id_escuela=:escuela 
        ORDER BY TP.nombre ASC");
        $statement->bindParam(':escuela', $escuela);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarProgramasPorEscuela[] = $consulta;
        }
        return $listarProgramasPorEscuela;
    }
}
