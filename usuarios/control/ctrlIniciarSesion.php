<?php
require_once('../../tools/Modal.php');
require_once('../Modelo/ModeloUsuarios.php');


$modal = new Modal();
$usuario = new Usuarios();

$identificacion = $_POST['identificacion'];
$password = $_POST['password'];


$Identificacion = rtrim($identificacion, " ");
$Password = rtrim($password, " ");

//validamos que los campos no esten vacidos
if (empty($Identificacion) != 1 && empty($Password) != 1) {

    //validamos que no exista un usuario con este numero de identificaion
    $userExiste = $usuario->existeUsuario($identificacion);
    if ($userExiste) {
        foreach ($userExiste as $userExiste) {
            $passwordHash = $userExiste['password'];
        }

        //Validamos el hash de la base de datos, con el pass del usuario. Esto nos devuelve 1 si es true
        if (password_verify($Password, $passwordHash)) {

            //Iniciamos sesion, la alerta del login nos redirecciona a la pagina de reportes
            if ($usuario->iniciarSesion($Identificacion)) {
                $modal->alertaLogin();
            } else {
                $modal->modalInformativa("Iniciar sesion", "Error en la base de datos");
            }
        } else {
            $modal->modalInformativa("Iniciar sesion", "La contraseña  no coincide");
        }
    } else {
        $modal->modalInformativa("Iniciar sesion", "No se encuentra registrado en el sistema.");
    }
} else {
    $modal->modalInformativa("Iniciar sesion", "Verifica los datos ingresados.");
}
