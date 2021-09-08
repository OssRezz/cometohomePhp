<?php
require '../Modelo/ModeloEventos.php';
require '../../tools/Modal.php';

$eventos = new Eventos();
$modal = new Modal();

$id_evento = $_POST['id_evento'];
$nombre = $_POST['nombreEvento'];
$descripcion = $_POST['descripcionEvento'];
$fecha = $_POST['fechaEvento'];
$horainicio = $_POST['inicioEvento'];
$horafin = $_POST['finEvento'];


$Nombre = rtrim($nombre, " ");
$Descripcion = rtrim($descripcion, " ");
$Fecha = rtrim($fecha, " ");
$Horainicio = rtrim($horainicio, " ");
$Horafin = rtrim($horafin, " ");

try {

    if (empty($Nombre) != 1 && empty($Descripcion) != 1  && empty($Fecha) != 1  && empty($Horainicio) != 1 && empty($Horafin) != 1) {

        if ($eventos->actualizarEvento($id_evento, $Nombre, $Descripcion, $Fecha, $Horainicio, $Horafin)) {
            $modal->modalAlerta("Actualizar evento", "success",  "El evento se ha actualizado exitosamente.");
        } else {
            $modal->modalAlerta("Actualizar evento", "danger",  "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Actualizar evento", "info",  "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Actualizar evento", "danger", "El evento no se pudo actualizar, Por favor verifique la información.");
}
