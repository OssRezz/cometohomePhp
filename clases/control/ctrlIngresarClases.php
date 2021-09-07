<?php
require '../../tools/Modal.php';
require '../Modelo/ModeloClases.php';

$clases = new Clases();
$modal = new Modal();

$grupo = $_POST['grupo'];
$fechaIni = $_POST['fechaIni'];
$fechaFin = $_POST['fechaFin'];
$cantClases = $_POST['cantClases'];
$selectEstado = $_POST['selectEstado'];

$Grupo = rtrim($grupo, " ");
$FechaIni = rtrim($fechaIni, " ");
$FechaFin = rtrim($fechaFin, " ");
$CantClases = rtrim($cantClases, " ");
try {

    if (empty($Grupo) != 1 && empty($FechaIni) != 1  && empty($FechaFin) != 1  && empty($CantClases) != 1) {

        if ($clases->insertarClase($Grupo, $FechaIni, $FechaFin, $CantClases, $selectEstado)) {
            $modal->modalAlerta("Ingresar clase", "success", "La clase se inserto exitosamente");
        } else {
            $modal->modalAlerta("Ingresar clase", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Ingresar clase", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Ingresar clase", "danger", "La clase no se pudo insertar, revise la Información  ingresada");
}
