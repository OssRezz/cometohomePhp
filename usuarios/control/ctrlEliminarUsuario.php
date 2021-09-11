<?php
require '../Modelo/ModeloUsuarios.php';
require '../../tools/Modal.php';

$usuarios = new Usuarios();
$modal = new Modal();

$id_usuario = $_POST['id_usuario'];

try {
    if ($usuarios->eliminarUsuario($id_usuario)) {
        $modal->modalAlerta("Usuario eliminada", "success", "La sede se ha eliminado correctamente");
    } else {
        $modal->modalAlerta("Usuario informacion", "danger", "Algo salió mal.");
    }
} catch (PDOException $e) {
    $modal->modalAlerta("Usuario error", "danger", "Esta sede no se puede eliminar");
}
