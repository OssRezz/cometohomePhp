<?php
require '../../tools/Modal.php';
require '../Modelo/ModeloProgramas.php';
$programas = new Programas();
$modal = new Modal();

$selectescuela = $_POST['selectescuela'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$selectsede = $_POST['selectsede'];
$cupos = $_POST['cupos'];
$costo = $_POST['costo'];
$fechainicio = $_POST['fechainicio'];
$fechafinal = $_POST['fechafinal'];
$horario = $_POST['horario'];
$selectestado = $_POST['selectestado'];


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

        if ($programas->insertarPrograma($Escuela, $Nombre, $Edad, $Sede, $Cupos, $costo, $FechaInicio, $Fechafinal, $Horario, $Estado)) {
            $modal->modalInformativa("Ingresar programa", "La sede se ha ingreado exitosamente.");
        } else {
            $modal->modalInformativa("Ingresar programa", "Error en la base de datos");
        }
    } else {
        $modal->modalInformativa("Informacion", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalInformativa("danger", "El programa no se pudo insertar, verifica la informacion.");
}
