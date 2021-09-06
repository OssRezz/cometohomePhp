<?php

require_once '../../conexion.php';

class Usuarios extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }



    public function listarUsuarios($paginationStart, $limit)
    {
        $listarUsuarios = null;
        $statement = $this->db->prepare("SELECT tu.codigo,tu.identificacion,tu.nombre,tu.email,tu.password,tp.id_perfil,tp.perfil FROM tbl_usuarios AS tu 
        INNER JOIN tbl_perfiles AS tp ON tp.id_perfil = tu.id_perfil ORDER BY `nombre` desc LIMIT  $paginationStart, $limit;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarUsuarios[] = $consulta;
        }
        return $listarUsuarios;
    }

    public function contadorUsuarios()
    {
        $contadorUsuarios = null;
        $statement = $this->db->prepare("SELECT COUNT(codigo) as 'id' FROM `tbl_usuarios`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorUsuarios[] = $consulta;
        }
        return $contadorUsuarios;
    }

    public function MostrarUsuarioById($id)
    {
        $MostrarUsuarioById = null;
        $statement = $this->db->prepare("SELECT tu.codigo,tu.identificacion,tu.nombre,tu.email,tu.password,tp.id_perfil,tp.perfil FROM tbl_usuarios AS tu 
        INNER JOIN tbl_perfiles AS tp ON tp.id_perfil = tu.id_perfil
        WHERE codigo=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $MostrarUsuarioById[] = $consulta;
        }
        return $MostrarUsuarioById;
    }

    public function listarPerfiles()
    {
        $listarPerfiles = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_perfiles");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarPerfiles[] = $consulta;
        }
        return $listarPerfiles;
    }

    public function insertarUsuario($identificacion, $nombre, $email, $password, $id_perfil)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_usuarios`(`identificacion`, `nombre`,`email`, `password`, `id_perfil`) VALUES (:identificacion,:nombre,:email,:password,:id_perfil)");
        $statement->bindParam(':identificacion', $identificacion);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':id_perfil', $id_perfil);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function actualizarUsuario($codigo, $identificacion, $nombre, $email, $id_perfil)
    {
        $statement = $this->db->prepare("UPDATE `tbl_usuarios` SET
         `identificacion`=:identificacion,`nombre`=:nombre,`email`=:email,`id_perfil`=:id_perfil WHERE codigo=:codigo");
        $statement->bindParam(':codigo', $codigo);
        $statement->bindParam(':identificacion', $identificacion);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':id_perfil', $id_perfil);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
