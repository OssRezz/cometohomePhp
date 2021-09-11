<?php

require '../Modelo/ModeloUsuarios.php';
require '../../tools/Modal.php';

$usuarios = new Usuarios();
$modal = new Modal();


$id_usuario = $_POST['id_usuario'];


if ($id_usuario != null) {
    $Usuario = $usuarios->MostrarUsuarioById($id_usuario);
    if ($Usuario != null) {
        foreach ($Usuario as $Usuario) {
            $nombre = $Usuario['nombre'];
        }

        //Building modal content
        $contenidoModal = "¿Eliminar el usuario: $nombre?";
        $contenidoModal .= "<div class='row d-flex justify-content-end p-3'> ";
        $contenidoModal .= "    <div class='col-5'>";
        $contenidoModal .= "        <button type='button' id='btn-cancelar' class='btn btn-outline-primary btn-block rounded-0' >Cancelar</button>";
        $contenidoModal .= "    </div> ";
        $contenidoModal .= "    <div class='col-5'>";
        $contenidoModal .= "        <button type='button' id='btn-eliminar-usuario' value='$id_usuario' class='btn btn-outline-danger  btn-block rounded-0' >Eliminar Sede</button>";
        $contenidoModal .= "    </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<script>$('#btn-cancelar').click(function(){location.reload()});</script>";


        $modal->modalForm("Eliminar usuario", $contenidoModal);
    } else {
        $modal->modalAlerta("Eliminar usuario", "danger", "Algo salió mal en la base de datos");
    }
} else {
    $modal->modalAlerta("Eliminar usuario", "danger", "Algo salió mal en la base de datos");
}
