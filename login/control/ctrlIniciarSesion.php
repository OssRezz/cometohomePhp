<?php
require_once('../../tools/Modal.php');
require_once('../Modelo/ModeloLogin.php');

$login = new Login();
$modal = new Modal();


$identificacion = $_POST['identificacion'];
$password = $_POST['password'];


$Identificacion = rtrim($identificacion, " ");
$Password = rtrim($password, " ");

//validamos que los campos no esten vacidos
if (empty($Identificacion) != 1 && empty($Password) != 1) {

    //validamos que no exista un usuario con este numero de identificaion
    if ($userExiste = $login->existeUsuario($identificacion)) {
        foreach ($userExiste as $userExiste) {
            $passwordHash = $userExiste['password'];
        }
    }
    //Validamos el hash de la base de datos, con el pass del usuario. Esto nos devuelve 1 si es true
    if (password_verify($Password, $passwordHash)) {
        
        //Iniciamos sesion, la alerta del login nos redirecciona a la pagina de reportes
        $login->iniciarSesion($Identificacion);
        $modal->alertaLogin();
    } else {
        $modal->modalAlerta("Iniciar sesion", "info", "La contraseña  no coincide");
    }
} else {
    $modal->modalInformativa("Iniciar sesion", "Todos los campos son requeridos.");
}
