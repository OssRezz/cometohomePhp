<?php

require '../../tools/Modal.php';
require '../Modelo/ModeloMatriculas.php';
$modal =  new Modal();
$matriculas = new Matriculas();

$fecha = $_POST['fecha'];
$id_inscripcion = $_POST['id_inscripcion'];
$valorpago = $_POST['valorpago'];
$cedula = $_POST['cedula'];
$selectClase = $_POST['selectClase'];



$Fecha = rtrim($fecha, " ");
$Id_inscripcion = rtrim($id_inscripcion, " ");
$Valorpago = rtrim($valorpago, " ");
$Cedula = rtrim($cedula, " ");
$SelectClase = rtrim($selectClase, " ");


try {

    if (empty($Fecha) != 1 && empty($Id_inscripcion) != 1  && empty($Cedula) != 1  && empty($selectClase) != 1) {

        if ($matriculas->insertarMatricula($Fecha, $Id_inscripcion, $Valorpago, $Cedula, $selectClase)) {
            $modal->modalAlerta("Ingresar matricula", "success", "Estudiante matriculado exitosamente.");
        } else {
            $modal->modalAlerta("Error", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Informacion", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Informacion", "danger", "Verifica los datos ingresados.");
}
