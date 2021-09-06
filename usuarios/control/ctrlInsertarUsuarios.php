<?php

require '../Modelo/ModeloUsuarios.php';
require '../../tools/Modal.php';

$usuarios = new Usuarios();
$modal = new Modal();

$identificacion = $_POST['identificacion'];
$nombre = $_POST['nombre'] . " " . $_POST['apellido'];
$perfil = $_POST['selectperfil'];
$correo = $_POST['correo'];
$password = $_POST['password'];


$Identificacion = rtrim($identificacion, " ");
$Nombre = rtrim($nombre, " ");
$Perfil = rtrim($perfil, " ");
$Correo = rtrim($correo, " ");
$Password = rtrim($password, " ");


try {

    if (empty($Identificacion) != 1 && empty($Nombre) != 1 && empty($Perfil) != 1  && empty($Correo) != 1  && empty($Password) != 1) {

        if ($usuarios->insertarUsuario($Identificacion, $Nombre, $Correo, password_hash($Password, PASSWORD_DEFAULT), $Perfil)) {
            $modal->modalInformativa("Ingresar Usuario", "El usuario se ha ingreado exitosamente.");
        } else {
            $modal->modalInformativa("Ingresar Usuario", "Error en la base de datos");
        }
    } else {
        $modal->modalInformativa("Informacion", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalInformativa("danger", "El usuario: $Nombre. No se encuentra registrado en el sistema, Por favor verifique la información.");
}
