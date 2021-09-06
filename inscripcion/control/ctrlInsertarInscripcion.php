<?php
require '../../tools/Modal.php';
require '../Modelo/ModeloInscripcion.php';

$modal =  new Modal();
$inscripcion = new Inscripcion();


$cedula = $_POST['cedula'];
$fecha = $_POST['fecha'];
$id_programa = $_POST['idPrograma'];


$Cedula = rtrim($cedula, " ");

try {
    if (empty($Cedula) != 1) {
        if ($inscripcion->insertarInscripcion($fecha, $id_programa, $cedula)) {
            $modal->modalAlerta("innscripcion exitosa.", "success", "Su inscripcion fue exitosa.");
        } else {
            $modal->modalAlerta("Error", "danger", "Problemas en la base de datos.");
        }
    } else {
        $modal->modalAlerta("Informacion", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Error documento de identificación",  "warning", "La identificación no coincide con nuestros registros.",);
}
