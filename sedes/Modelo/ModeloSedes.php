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
        $statement = $this->db->prepare("SELECT * FROM tbl_sedes LIMIT 10;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarSedes[] = $consulta;
        }
        return $listarSedes;
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
}
