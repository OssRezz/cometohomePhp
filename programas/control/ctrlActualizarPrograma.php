<?php
require '../../tools/Modal.php';
require '../Modelo/ModeloProgramas.php';
$programas = new Programas();
$modal = new Modal();

$id_programa = $_POST['id_programa'];
$selectescuela = $_POST['selectescuelaPrograma'];
$nombre = $_POST['nombrePrograma'];
$edad = $_POST['edadPrograma'];
$selectsede = $_POST['selectsedePrograma'];
$cupos = $_POST['cuposPrograma'];
$costo = $_POST['costoPrograma'];
$fechainicio = $_POST['fechaIniPrograma'];
$fechafinal = $_POST['fechaFinPrograma'];
$horario = $_POST['horarioPrograma'];
$selectestado = $_POST['estadoPrograma'];


$Escuela = rtrim($selectescuela, " ");
$Nombre = rtrim($nombre, " ");
$Edad = rtrim($edad, " ");
$Sede = rtrim($selectsede, " ");
$Cupos = rtrim($cupos, " ");
$FechaInicio = rtrim($fechainicio, " ");
$Fechafinal =  rtrim($fechafinal, " ");
$Horario =  rtrim($horario, " ");
$Estado = rtrim($selectestado, " ");


try {
    if (empty($Nombre) != 1 && empty($Edad) != 1  && empty($Cupos) != 1  && empty($Horario) != 1) {
        if ($Estado === "Activo") {
            $Estado = 1;
        } else if ($Estado === "Inactivo") {
            $Estado = 0;
        }
        if ($programas->actualizarPrograma($id_programa, $Escuela, $Nombre, $Edad, $Sede, $Cupos, $costo, $FechaInicio, $Fechafinal, $Horario, $Estado)) {
            $modal->modalAlerta("Actualizar programa", "success", "El programa se actualizó exitosamente");
        } else {
            $modal->modalAlerta("Actualizar programa", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Actualizar programa", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Actualizar programa", "danger", "El programa no se pudo actualizar, revise la Información  ingresada");
}
