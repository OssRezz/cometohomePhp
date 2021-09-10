<?php
require 'ctrlMailPassword.php';
require '../Modelo/ModeloConfig.php';
require '../../tools/Modal.php';



$modal = new Modal();
$config = new Configuraciones();

$id = $_POST['codigo'];
$nuevoPassword = $_POST['nuevoPassword'];
$repetirPassword = $_POST['repetirPassword'];
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];


$Password_uno = rtrim($nuevoPassword, " ");
$Password_dos = rtrim($repetirPassword, " ");
if (empty($Password_uno) != 1 && empty($Password_dos)  != 1  && empty($id)  != 1) {

    if ($Password_uno === $Password_dos) {
        $Password = $Password_uno;
        if ($config->actualizarPassword(password_hash($Password, PASSWORD_DEFAULT), $id) && sendMail($correo, $nombre)) {

            $modal->modalAlerta("Actualizar contraseña", "success", "El contraseña se actualizo correctamente.");
        } else {
            $modal->modalInformativa("Actualizar contraseña", "<div class='text-danger'contraseña no valida.</div>");
        }
    } else {
        $modal->modalInformativa("Actualizar contraseña", "<div class='text-primary'>Las contraseñas deben coincidir.</div>");
    }
    
} else {
    $modal->modalInformativa("Actualizar contraseña", "<div class='text-primary'>Todos los campos son requeridos.</div>");
}
