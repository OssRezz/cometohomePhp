<?php

require_once '../../conexion.php';
session_start();

class Login extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function iniciarSesion($identificacion)
    {
        $statement = $this->db->prepare("SELECT * FROM tbl_usuarios WHERE identificacion=:identificacion");
        $statement->bindParam(':identificacion', $identificacion);
        $statement->execute();
        if ($statement->rowCount() === 1) {
            $consulta = $statement->fetch();
            $_SESSION['nombre'] = $consulta["nombre"];
            $_SESSION['perfil'] = $consulta["id_perfil"];
            $_SESSION['id'] = $consulta["codigo"];
            $_SESSION['correo'] = $consulta["email"];
            $_SESSION['identificacion'] = $consulta["identificacion"];

            return true;
        } else {
            return false;
        }
    }

    /**
     * existeUsuario
     *
     *Si el usuario existe en la base de datos, va a retornar un arreglo
     *con toda la informacion.
     *
     * @param  mixed $cedula
     */
    public function existeUsuario($cedula)
    {
        $existeUsuario = null;
        $statement = $this->db->prepare("SELECT * FROM tbl_usuarios  WHERE identificacion=:cedula");
        $statement->bindParam(':cedula', $cedula);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $existeUsuario[] = $consulta;
        }
        return $existeUsuario;
    }

    public function logOut()
    {
        session_destroy();
    }
}
