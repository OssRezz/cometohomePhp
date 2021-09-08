<?php
require '../../tools/Modal.php';
require '../Modelo/ModeloEstudiantes.php';
$estudiantes = new Estudiantes();
$modal = new Modal();

$cc_estudiante = $_POST['cc_estudiante'];
$identificacion = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$sisben = $_POST['sisben'];
$fecha = $_POST['fecha'];
$selectpoblacion = $_POST['selectpoblacion'];
$selectgenero = $_POST['selectgenero'];

$Identificacion = rtrim($identificacion, " ");
$Nombre = rtrim($nombre, " ");
$Email = rtrim($email, " ");
$Direccion = rtrim($direccion, " ");
$Telefono = rtrim($telefono, " ");
$Sisben =  rtrim($sisben, " ");
$Fecha =  rtrim($fecha, " ");
$Selectpoblacion = rtrim($selectpoblacion, " ");
$Selectgenero = rtrim($selectgenero, " ");
try {

    if (empty($Identificacion) != 1  && empty($Nombre) != 1  && empty($Direccion) != 1  && empty($Email) != 1  && empty($Telefono) != 1  && empty($Fecha) != 1 && empty($Sisben)  != 1) {

        if ($estudiantes->actualizarEstudiante($cc_estudiante, $Identificacion, $Nombre, $Selectgenero, $Selectpoblacion, $Direccion, $Email, $Telefono, $Fecha, $Sisben)) {
            $modal->modalAlerta("Actualizar estudiante", "success", "La sede se ha actualizado exitosamente.");
        } else {
            $modal->modalAlerta("Actualizar estudiante", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Actualizar estudiante", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Actualizar estudiante", "danger", "El numero de identificación $cc_estudiante, no se puede actualizar debido a que ya existe o contiene registros.");
}
