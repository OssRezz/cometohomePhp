<?php


require '../Modelo/ModeloConfig.php';
require '../../tools/Modal.php';


$modal = new Modal();
$config = new Configuraciones();

$id = $_POST['id'];
$nuevoEmail = $_POST['nuevoEmail'];
$repetirEmail = $_POST['repetirEmail'];

$Email_uno = rtrim($nuevoEmail, " ");
$Email_dos = rtrim($repetirEmail, " ");

if (empty($Email_uno) != 1 && empty($Email_dos)  != 1  && empty($id)  != 1) {

    if ($Email_uno === $Email_dos) {
        $Email = $Email_uno;
        if ($config->actualizarCorreo($Email, $id)) {
            $modal->modalAlerta("Actualizar correo", "success", "El correo se actualizo correctamente.");
        } else {
            $modal->modalInformativa("Actualizar correo", "<div class='text-danger'Correo no valido.</div>");
        }
    } else {
        $modal->modalInformativa("Actualizar correo", "<div class='text-info'>Los correos deben coincidir.</div>");
    }
} else {
    $modal->modalInformativa("Actualizar correo", "<div class='text-danger'>Todos los campos son requeridos.</div>");
}
