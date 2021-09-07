<?php

require '../Modelo/ModeloProfesores.php';
require '../../tools/Modal.php';

$profesores = new Profesores();
$modal = new Modal();

$cc_profesor = $_POST['cc_profesor'];
$identificacion = $_POST['identificacion'];
$nombreProfesor = $_POST['nombreProfesor'];
$emailProfesor = $_POST['emailProfesor'];
$telefonoProfesor = $_POST['telefonoProfesor'];
$tituloProfesor = $_POST['tituloProfesor'];

$Cedula = rtrim($cc_profesor, " ");
$Identificacion = rtrim($identificacion, " ");
$Nombre = rtrim($nombreProfesor, " ");
$Email = rtrim($emailProfesor, " ");
$Telefono = rtrim($telefonoProfesor, " ");
$Titulo = rtrim($tituloProfesor, " ");






try {

    if (empty($Cedula) != 1 && empty($Nombre) != 1  && empty($Identificacion) != 1  && empty($Telefono) != 1 && empty($Email) != 1 && empty($Titulo) != 1) {
        if ($profesores->actualizarProfesor($Cedula, $Identificacion, $Nombre, $Telefono, $Email, $Titulo)) {
            $modal->modalAlerta("Actualizar profesor", "success", "El profesor se actualizó exitosamente");
        } else {
            $modal->modalAlerta("Actualizar profesor", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Actualizar profesor", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Actualizar clase", "danger", "El numero de identificación $cc_profesor, no se puede actualizar debido a que ya existe o contiene registros en matricula.");
}
