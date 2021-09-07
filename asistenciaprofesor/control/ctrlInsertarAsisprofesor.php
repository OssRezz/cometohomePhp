<?php

require '../Modelo/ModeloAsisprofesor.php';
require '../../tools/Modal.php';

$asisprofesor = new Asisprofesor();
$modal = new Modal();

$cedula = $_POST['cedula'];
$selectClases = $_POST['selectClases'];
$fechaClase = $_POST['fechaClase'];
$selectAsistencia = $_POST['selectAsistencia'];


$Cedula = rtrim($cedula, " ");
$SelectClases = rtrim($selectClases, " ");
$fechaClase = rtrim($fechaClase, " ");

try {

    if (empty($Cedula) != 1 && empty($SelectClases) != 1 && empty($fechaClase) != 1) {

        if ($asisprofesor->insertarAsisprofesor($SelectClases, $Cedula, $fechaClase, $selectAsistencia)) {
            $modal->modalAlerta("Ingresar asistencia ", "succes", "La asistencia del profesor se ha ingreado exitosamente.");
        } else {
            $modal->modalAlerta("Ingresar asistencia ", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Ingresar asistencia", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Ingresar asistencia", "danger", "El profesor: $Cedula. No se encuentra registrado en el sistema, Verifique la información.");
}
