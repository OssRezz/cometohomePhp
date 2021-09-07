<?php
require_once '../../conexion.php';

class Clases extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarClasesPagination($paginationStart, $limit)
    {
        $listarClasesPagination = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_clases  ORDER BY id_clase  desc LIMIT $paginationStart, $limit;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarClasesPagination[] = $consulta;
        }
        return $listarClasesPagination;
    }
    public function contadorClases()
    {
        $contadorClases = null;
        $statement = $this->db->prepare("SELECT Count(id_clase) as 'id' FROM tbl_clases");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorClases[] = $consulta;
        }
        return $contadorClases;
    }

    public function listarClases()
    {
        $listarClases = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_clases");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarClases[] = $consulta;
        }
        return $listarClases;
    }

    public function MostrarClaseById($id)
    {
        $listarClases = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_clases WHERE id_clase=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarClases[] = $consulta;
        }
        return $listarClases;
    }

    public function insertarClase($grupo, $fechainicio, $fechafin, $numeroclases, $estado)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_clases`(`grupo`, `numeroclases`,`fechainicio`, `fechafin`, `estado`)
         VALUES (:grupo,:numeroclases,:fechainicio,:fechafin,:estado)");
        $statement->bindParam(':grupo', $grupo);
        $statement->bindParam(':numeroclases', $numeroclases);
        $statement->bindParam(':fechainicio', $fechainicio);
        $statement->bindParam(':fechafin', $fechafin);
        $statement->bindParam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarClase($idclase, $grupo, $numeroclases, $fechainicio, $fechafin, $estado)
    {
        $statement = $this->db->prepare("UPDATE `tbl_clases` SET `grupo`=:grupo,`numeroclases`=:numeroclases,
        `fechainicio`=:fechainicio,`fechafin`=:fechafin,`estado`=:estado  WHERE id_clase=:idclase");
        $statement->bindParam(':idclase', $idclase);
        $statement->bindParam(':grupo', $grupo);
        $statement->bindParam(':numeroclases', $numeroclases);
        $statement->bindParam(':fechainicio', $fechainicio);
        $statement->bindParam(':fechafin', $fechafin);
        $statement->bindParam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
