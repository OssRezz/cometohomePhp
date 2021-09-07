<?php
require '../../tools/Modal.php';
require '../Modelo/ModeloClases.php';

$clases = new Clases();
$modal = new Modal();

$id_clase = $_POST['idClase'];
$grupo = $_POST['grupoClase'];
$fechaIni = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFinal'];
$cantClases = $_POST['numeroClases'];
$Estado = $_POST['estadoClase'];

$Grupo = rtrim($grupo, " ");
$FechaIni = rtrim($fechaIni, " ");
$FechaFin = rtrim($fechaFin, " ");
$CantClases = rtrim($cantClases, " ");
try {

    if (empty($Grupo) != 1 && empty($FechaIni) != 1  && empty($FechaFin) != 1  && empty($CantClases) != 1) {

        if ($Estado === "Activo") {
            $Estado = 1;
        } else if ($Estado === "Inactivo") {
            $Estado = 0;
        }

        if ($clases->actualizarClase($id_clase, $Grupo, $CantClases, $FechaIni, $FechaFin, $Estado)) {
            $modal->modalAlerta("Actualizar clase", "success", "La clase se actualizó exitosamente");
        } else {
            $modal->modalAlerta("Actualizar clase", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Actualizar clase", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Actualizar clase", "danger", "La clase no se pudo actualizar, revise la Información  ingresada");
}
