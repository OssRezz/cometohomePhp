<?php

require '../Modelo/ModeloUsuarios.php';
require '../../tools/Modal.php';

$usuarios = new Usuarios();
$modal = new Modal();

$id_usuario = $_POST['id_usuario'];


if ($id_usuario != null) {
    $Usuarios = $usuarios->MostrarUsuarioById($id_usuario);
    if ($Usuarios != null) {
        foreach ($Usuarios as $Usuarios) {
            $identificacion = $Usuarios['identificacion'];
            $nombre = $Usuarios['nombre'];
            $email = $Usuarios['email'];
            $id_perfilUsuario = $Usuarios['id_perfil'];
            $tipoperfil = $Usuarios['perfil'];
        }

        //Building modal content
        $contenidoModal = "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='identificacionUser'>Identificación</label>";
        $contenidoModal .= "     <input type='number' id='codigoUser' class='form-control' value='$id_usuario' hidden>";
        $contenidoModal .= "     <input type='number' id='identificacionUser' class='form-control' value='$identificacion'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='nombreUser'>Nombre</label>";
        $contenidoModal .= "     <input type='text' id='nombreUser' class='form-control' value='$nombre'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='correoUser'>Correo</label>";
        $contenidoModal .= "     <input type='email' id='correoUser' value='$email' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='cedula'>Clase</label> ";
        $contenidoModal .= "     <select name='selectperfilUser' id='selectperfilUser' class='form-control'>";
        $contenidoModal .=                       "<option value='$id_perfilUsuario'>$tipoperfil</option>";

        $Perfil = $usuarios->listarPerfiles();
        if ($Perfil != null) {
            foreach ($Perfil as $Perfil) {
                $id_perfil =  $Perfil['id_perfil'];
                $perfil =  $Perfil['perfil'];
                if ($id_perfilUsuario != $id_perfil) {
                    $contenidoModal .= "<option value='$id_perfil'>$perfil</option>";
                }
            }
        } else {
            $contenidoModal .=  "<option value='' disabled>no hay perfiles activos.</option>";
        }

        $contenidoModal .=                        "</select>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'> ";
        $contenidoModal .= "  <div class='col'>";
        $contenidoModal .= "    <button type='button' id='btn-actualizar-usuario' class='btn btn-outline-success btn-block rounded-0' >Actualizar usuario</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $modal->modalForm("Actualizar usuario", $contenidoModal);
    } else {
        $modal->modalInformativa("error", "Algo asdas mal");
    }
} else {
    $modal->modalInformativa("error", "Algo salio mal");
}
