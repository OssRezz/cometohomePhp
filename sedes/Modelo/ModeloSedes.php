<?php

require_once '../../conexion.php';

class Sedes extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarSedes()
    {
        $listarSedes = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_sedes");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarSedes[] = $consulta;
        }
        return $listarSedes;
    }

    public function listarSedesPagination($paginationStart, $limit)
    {
        $listarSedes = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_sedes  ORDER BY nombre  desc LIMIT $paginationStart, $limit;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarSedes[] = $consulta;
        }
        return $listarSedes;
    }

    public function contadorSedes()
    {
        $listarSedes = null;
        $statement = $this->db->prepare("SELECT count(id_sede) as 'id' FROM tbl_sedes");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarSedes[] = $consulta;
        }
        return $listarSedes;
    }

    public function MostrarSedesById($id)
    {
        $MostrarSedesById = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_sedes WHERE id_sede=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $MostrarSedesById[] = $consulta;
        }
        return $MostrarSedesById;
    }


    public function insertarSede($nombre, $direccion, $telefono, $aula)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_sedes`(`nombre`, `direccion`, `telefono`, `aula`) VALUES  (:nombre,:direccion,:telefono,:aula)");
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':aula', $aula);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarSede($id_sede, $nombre, $direccion, $telefono, $aula)
    {
        $statement = $this->db->prepare("UPDATE `tbl_sedes` SET `nombre`=:nombre,
        `direccion`=:direccion,`telefono`=:telefono,`aula`=:aula WHERE id_sede=:id_sede");
        $statement->bindParam(':id_sede', $id_sede);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':aula', $aula);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminarSedes($sede)
    {
        $statement = $this->db->prepare("DELETE FROM `tbl_sedes` WHERE id_sede= :sede");
        $statement->bindParam(':sede', $sede);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
