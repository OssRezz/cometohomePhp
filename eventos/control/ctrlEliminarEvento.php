<?php
require '../Modelo/ModeloEventos.php';
require '../../tools/Modal.php';

$eventos = new Eventos();
$modal = new Modal();

$evento = $_POST['evento'];


try {
    if ($eventos->eliminarEvento($evento)) {
        $modal->modalAlerta("Evento eliminada", "success", "El evento se ha eliminado correctamente");
    } else {
        $modal->modalAlerta("Evento informacion", "danger", "Algo salió mal.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Evento error", "danger", "Esta Evento no se puede eliminar");
}
