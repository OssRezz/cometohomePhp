<?php
require '../Modelo/ModeloSedes.php';
require '../../tools/Modal.php';

$sedes = new Sedes();
$modal = new Modal();

$sede = $_POST['sede'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$aula = $_POST['aula'];


$Sede = rtrim($sede, " ");
$Direccion = rtrim($direccion, " ");
$Telefono = rtrim($telefono, " ");
$Aula = rtrim($aula, " ");


try {

    if (empty($Sede) != 1 && empty($Direccion) != 1  && empty($Telefono) != 1  && empty($Aula) != 1) {

        if ($sedes->insertarSede($Sede, $Direccion, $Telefono, $Aula)) {
            $modal->modalInformativa("Ingresar Usuario", "La sede se ha ingreado exitosamente.");
        } else {
            $modal->modalInformativa("Ingresar Usuario", "Error en la base de datos");
        }
    } else {
        $modal->modalInformativa("Informacion", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalInformativa("danger", "La sede: $sede. No se encuentra registrado en el sistema, Por favor verifique la información.");
}
