<?php

require_once '../../conexion.php';

class Inscripcion extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertarInscripcion($fecha, $id_programa, $cc_estudiante)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_inscripciones`(`fecha`, `id_programa`, `cc_estudiante`)
        VALUES (:fecha,:id_programa,:cc_estudiante)");
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':id_programa', $id_programa);
        $statement->bindParam(':cc_estudiante', $cc_estudiante);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function contadorInscripciones()
    {
        $contadorInscripciones = null;
        $statement = $this->db->prepare("SELECT Count(id_inscripcion) as 'id' FROM `tbl_inscripciones`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorInscripciones[] = $consulta;
        }
        return $contadorInscripciones;
    }
}
