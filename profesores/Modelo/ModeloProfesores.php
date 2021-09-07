<?php
require_once '../../conexion.php';

class Profesores extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarProfesoresPagination($paginationStart, $limit)
    {
        $listarProfesoresPagination = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_profesores ORDER BY cc_profesor desc LIMIT $paginationStart, $limit;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarProfesoresPagination[] = $consulta;
        }
        return $listarProfesoresPagination;
    }

    public function contadorProfesores()
    {
        $contadorProfesores = null;
        $statement = $this->db->prepare("SELECT Count(cc_profesor) as 'id' FROM tbl_profesores");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorProfesores[] = $consulta;
        }
        return $contadorProfesores;
    }

    public function mostrarProfesorById($id)
    {
        $listarProfesores = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_profesores WHERE cc_profesor=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarProfesores[] = $consulta;
        }
        return $listarProfesores;
    }

    public function insertarProfesores($cc_profesor, $nombre, $telefono, $email, $titulo)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_profesores`(`cc_profesor`, `nombre`, `telefono`, `email`, `titulo`)
         VALUES (:cc_profesor,:nombre,:telefono,:email,:titulo)");
        $statement->bindParam(':cc_profesor', $cc_profesor);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':titulo', $titulo);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarProfesor($cc_profesor, $identificacion, $nombre, $telefono, $email, $titulo)
    {
        $statement = $this->db->prepare("UPDATE `tbl_profesores` SET `cc_profesor`=:identificacion,`nombre`=:nombre,
        `telefono`=:telefono,`email`=:email,`titulo`=:titulo WHERE cc_profesor=:cc_profesor");
        $statement->bindParam(':cc_profesor', $cc_profesor);
        $statement->bindParam(':identificacion', $identificacion);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':titulo', $titulo);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
