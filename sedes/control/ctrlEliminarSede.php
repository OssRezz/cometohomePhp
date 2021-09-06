<?php
require '../Modelo/ModeloSedes.php';
require '../../tools/Modal.php';

$sedes = new Sedes();
$modal = new Modal();

$idsede = $_POST['idsede'];

try {
    if ($sedes->eliminarSedes($idsede)) {
        $modal->modalAlerta("Sede eliminada", "success", "La sede se ha eliminado correctamente");
    } else {
        $modal->modalAlerta("Sede informacion", "danger", "Algo salió mal.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Sede error", "danger", "Esta sede no se puede eliminar");
}
