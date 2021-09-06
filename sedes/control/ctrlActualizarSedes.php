<?php
require '../Modelo/ModeloSedes.php';
require '../../tools/Modal.php';

$sedes = new Sedes();
$modal = new Modal();

$idSede = $_POST['idSede'];
$nombreSede = $_POST['nombreSede'];
$direccion = $_POST['direccionSede'];
$telefono = $_POST['telefonoSede'];
$aula = $_POST['aulaSede'];

$IdSede = rtrim($idSede, " ");
$NombreSede = rtrim($nombreSede, " ");
$Direccion = rtrim($direccion, " ");
$Telefono = rtrim($telefono, " ");
$Aula = rtrim($aula, " ");


try {

    if (empty($NombreSede) != 1 && empty($Direccion) != 1  && empty($Telefono) != 1  && empty($Aula) != 1) {

        if ($sedes->actualizarSede($IdSede, $NombreSede, $Direccion, $Telefono, $Aula)) {
            $modal->modalAlerta("Actualizar Usuario", "success", "La sede se ha actualizado exitosamente.");
        } else {
            $modal->modalAlerta("Actualizar Usuario", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Actualizar Usuario", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Actualizar Usuario", "danger", "error en la informacion");
}
