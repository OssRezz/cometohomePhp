<?php

require '../Modelo/ModeloAsisestudiante.php';
require '../../tools/Modal.php';

$asisestudiante = new Asisestudiante();
$modal = new Modal();

$cedula = $_POST['cedula'];
$selectClases = $_POST['selectClases'];
$fechaClase = $_POST['fechaClase'];
$selectAsistencia = $_POST['selectAsistencia'];


$Cedula = rtrim($cedula, " ");
$SelectClases = rtrim($selectClases, " ");
$FechaClase = rtrim($fechaClase, " ");



    if (empty($Cedula) != 1 && empty($SelectClases) != 1 && empty($FechaClase) != 1) {

        if ($asisestudiante->insertarAsisestudiante($Cedula, $SelectClases, $FechaClase, $selectAsistencia)) {
            $modal->modalAlerta("Ingresar asistencia ", "success", "La asistencia del estudiante se ha ingreado exitosamente.");
        } else {
            $modal->modalAlerta("Ingresar asistencia ", "ganer", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Informacion", "info", "Verifica los datos ingresados.");
    }

