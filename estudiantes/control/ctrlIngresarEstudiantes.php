<?php
require '../../tools/Modal.php';
require '../Modelo/ModeloEstudiantes.php';
require '../../usuarios/Modelo/ModeloUsuarios.php';


$usuarios = new Usuarios();
$estudiantes = new Estudiantes();
$modal = new Modal();
$validation = false;


$identificacion = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$sisben = $_POST['sisben'];
$fecha = $_POST['nacimiento'];
$selectpoblacion = $_POST['selectPoblacion'];
$selectgenero = $_POST['selectGenero'];

$password = $_POST['password'];
$passwordVerify = $_POST['passwordVerify'];

$Identificacion = rtrim($identificacion, " ");
$Nombre = rtrim($nombre, " ");
$Apellido = rtrim($apellido, " ");
$Email = rtrim($email, " ");
$Direccion = rtrim($direccion, " ");
$Telefono = rtrim($telefono, " ");
$Sisben =  rtrim($sisben, " ");
$Fecha =  rtrim($fecha, " ");
$Selectpoblacion = rtrim($selectpoblacion, " ");
$Selectgenero = rtrim($selectgenero, " ");
$Password = rtrim($password, " ");
$PasswordVerify = rtrim($passwordVerify, " ");

if ($Password === $PasswordVerify) {
    $validation = true;
}



try {

    if (empty($Identificacion) != 1  && empty($Nombre) != 1  && empty($Direccion) != 1  && empty($Email) != 1  && empty($Telefono) != 1  && empty($Fecha) != 1 && empty($Sisben)  != 1  && $validation  === true) {

        //Si el usuario existe va a retornar true, no queremos repetir dos usuarios con la misma cedula
        $cedulaExiste = $usuarios->existeUsuario($identificacion);
        if ($cedulaExiste) {

            $modal->modalInformativa("Registro de estudiantes", "<div class='text-danger'>Ya hay un usuario registrado con esta identificacion, pongase en contacto con la casa de la cultura o verifique la información.</div>");
        } else {

            // 3 es igual a estudiante
            $Perfil = 3;
            $Nombre = $Nombre . " " . $Apellido;

            if (
                $usuarios->insertarUsuario($Identificacion, $Nombre, $Email, password_hash($Password, PASSWORD_DEFAULT), $Perfil)
                && $estudiantes->insertarEstudiante($Identificacion, $Nombre, $Selectgenero, $Selectpoblacion, $Direccion, $Email, $Telefono, $Fecha, $Sisben)
            ) {

                $modal->modalInformativa("Registro de estudiantes", "<div class='text-success'>La cuenta se ha registrado exitosamente.</div>");
            } else {
                $modal->modalInformativa("Registro de estudiantes", "<div class='text-danger'>La cuenta no se pudo registrar, esto debido a un error en nuestros servidores.</div>");
            }
        }
    } else {
        $modal->modalInformativa("Registro de estudiantes", "<div class='text-primary'>Todos los datos son obligatorios, verifica la información.</div>");
    }
} catch (PDOException $e) {
    $modal->modalInformativa(" de estudiantes", "danger", "<div class='text-danger'>El numero de identificación $cc_estudiante, no se puede registrar debido a que ya existe.</div>");
}
