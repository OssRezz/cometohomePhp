<?php

require '../Modelo/ModeloProfesores.php';
require '../../tools/Modal.php';

$profesores = new Profesores();
$modal = new Modal();

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$titulo = $_POST['titulo'];

$Cedula = rtrim($cedula, " ");
$Nombre = rtrim($nombre, " ");
$Apellido = rtrim($apellido, " ");
$Telefono = rtrim($telefono, " ");
$Email = rtrim($email, " ");
$Titulo = rtrim($titulo, " ");



try {

    if (empty($Cedula) != 1 && empty($Nombre) != 1  && empty($Apellido) != 1  && empty($Telefono) != 1 && empty($Email) != 1 && empty($Titulo) != 1) {
        $Nombre =  $Nombre . $apellido;
        if ($profesores->insertarProfesores($Cedula, $Nombre, $Telefono, $Email, $Titulo)) {
            $modal->modalAlerta("Ingresar profesor", "success", "El profesor se inserto exitosamente");
        } else {
            $modal->modalAlerta("Ingresar profesor", "danger", "Error en la base de datos");
        }
    } else {
        $modal->modalAlerta("Ingresar profesor", "info", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Ingresar profesor", "danger", "El numero de identificación $cc_profesor, ya se encuentra registrado en nuestro sistema.");
}
