<?php

require '../Modelo/ModeloUsuarios.php';
require '../../tools/Modal.php';

$usuarios = new Usuarios();
$modal = new Modal();

$codigo = $_POST['codigoUser'];
$identificacion = $_POST['identificacionUser'];
$nombre = $_POST['nombreUser'];
$perfil = $_POST['selectperfilUser'];
$correo = $_POST['correoUser'];


$Identificacion = rtrim($identificacion, " ");
$Nombre = rtrim($nombre, " ");
$Perfil = rtrim($perfil, " ");
$Correo = rtrim($correo, " ");

try {

    if (empty($Identificacion) != 1 && empty($Nombre) != 1 && empty($Perfil) != 1  && empty($Correo) != 1) {

        if ($usuarios->actualizarUsuario($codigo, $Identificacion, $Nombre, $Correo, $Perfil)) {
            $modal->modalAlerta("Actualizar Usuario", "success", "El usuario se ha actualizado exitosamente.");
        } else {
            $modal->modalAlerta("Actualizar Usuario", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Actualizar Usuario", "danger", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Actualizar Usuario", "danger", "Algo no salio bien");
}
