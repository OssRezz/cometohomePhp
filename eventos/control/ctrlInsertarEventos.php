<?php
require '../Modelo/ModeloEventos.php';
require '../../tools/Modal.php';

$eventos = new Eventos();
$modal = new Modal();

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$horainicio = $_POST['horainicio'];
$horafin = $_POST['horafin'];


$Nombre = rtrim($nombre, " ");
$Descripcion = rtrim($descripcion, " ");
$Fecha = rtrim($fecha, " ");
$Horainicio = rtrim($horainicio, " ");
$Horafin = rtrim($horafin, " ");

try {

    if (empty($Nombre) != 1 && empty($Descripcion) != 1  && empty($Fecha) != 1  && empty($Horainicio) != 1 && empty($Horafin) != 1) {

        if ($eventos->insertarEvento($Nombre, $Descripcion, $Fecha, $Horainicio, $Horafin)) {
            $modal->modalAlerta("Ingresar Usuario", "success",  "El evento se ha ingreado exitosamente.");
        } else {
            $modal->modalAlerta("Ingresar Usuario", "danger",  "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Informacion", "info",  "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("danger", "danger", "El evento no se pudo registrar, Por favor verifique la información.");
}
