<?php

require_once '../../conexion.php';

class Configuraciones extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function actualizarCorreo($correo, $id)
    {
        $statement = $this->db->prepare("UPDATE `tbl_usuarios` SET `email`=:correo  WHERE codigo=:id");
        $statement->bindParam(':correo', $correo);
        $statement->bindParam(':id', $id);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarPassword($password, $id)
    {
        $statement = $this->db->prepare("UPDATE `tbl_usuarios` SET `password`=:password  WHERE codigo=:id");
        $statement->bindParam(':password', $password);
        $statement->bindParam(':id', $id);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}
