<?php
require '../Modelo/ModeloProfesores.php';
require '../../tools/Modal.php';

$profesores = new Profesores();
$modal = new Modal();

$cc_profesor = $_POST['cc_profesor'];


if ($cc_profesor != null) {
    $Profesores = $profesores->mostrarProfesorById($cc_profesor);
    if ($Profesores != null) {
        foreach ($Profesores as $Profesores) {
            $identificacion  = $Profesores['cc_profesor'];
            $nombre = $Profesores['nombre'];
            $telefono = $Profesores['telefono'];
            $email = $Profesores['email'];
            $titulo = $Profesores['titulo'];
        }

        //Building modal content
        $contenidoModal = "<div class='form-group mb-2'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='identificacion'>Identificación </label>";
        $contenidoModal .= "     <input type='number' id='cc_profesor' class='form-control' value='$cc_profesor' hidden>";
        $contenidoModal .= "     <input type='number' id='identificacion' class='form-control' value='$identificacion'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group mb-2'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='nombreProfesor'>Nombre </label>";
        $contenidoModal .= "     <input type='text' id='nombreProfesor' value='$nombre' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group mb-2'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='tituloProfesor'>Título </label>";
        $contenidoModal .= "     <input type='text' id='tituloProfesor' value='$titulo' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group mb-2'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='emailProfesor'>Correo </label>";
        $contenidoModal .= "     <input type='email' id='emailProfesor' value='$email' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group mb-4'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='telefonoProfesor'>Teléfono </label>";
        $contenidoModal .= "     <input type='number' id='telefonoProfesor' value='$telefono' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'> ";
        $contenidoModal .= "  <div class='col'>";
        $contenidoModal .= "    <button type='button' id='btn-actualizar-profesor' class='btn btn-outline-success btn-block rounded-0' >Actualizar profesor</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $modal->modalForm("Actualizar profesor", $contenidoModal);
    } else {
        $modal->modalInformativa("Actualizar profesor", "Algo salió mal en la base de datos");
    }
} else {
    $modal->modalInformativa("Actualizar profesor", "Algo salió mal");
}
