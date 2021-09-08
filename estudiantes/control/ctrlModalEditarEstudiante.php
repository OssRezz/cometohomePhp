<?php

require '../../tools/Modal.php';
require '../Modelo/ModeloEstudiantes.php';


$estudiantes = new Estudiantes();
$modal = new Modal();

$cc_estudiante = $_POST['cc_estudiante'];


if ($cc_estudiante != null) {
    $Estudiante = $estudiantes->mostrarEstudiantesById($cc_estudiante);
    if ($Estudiante != null) {
        foreach ($Estudiante as $Estudiante) {
            $identificacion = $Estudiante['cc_estudiante'];
            $nombre = $Estudiante['nombre'];
            $fechanaci = $Estudiante['fechanaci'];
            $email = $Estudiante['email'];
            $telefono = $Estudiante['telefono'];
            $direccion = $Estudiante['direccion'];
            $sisben = $Estudiante['sisben'];

            $poblacionEstudiante = $Estudiante['id_poblacion'];
            $nombrePoblacion = $Estudiante['poblacion'];

            $generoEstudiante = $Estudiante['id_genero'];
            $nombreGenero = $Estudiante['genero'];
        }
        //Building modal content
        $contenidoModal = "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='identificacion'>Identificación</label>";
        $contenidoModal .= "     <input type='number' id='cc_estudiante' class='form-control' value='$cc_estudiante' hidden>";
        $contenidoModal .= "     <input type='number' id='identificacion' class='form-control' value='$identificacion'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='nombre'>Nombre</label>";
        $contenidoModal .= "     <input type='text' id='nombre' class='form-control' value='$nombre'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='fecha'>Fecha nacimiento</label>";
        $contenidoModal .= "     <input type='date' id='fecha' class='form-control' value='$fechanaci'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='email'>Correo</label>";
        $contenidoModal .= "     <input type='text' id='email' class='form-control' value='$email'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='telefono'>Teléfono</label>";
        $contenidoModal .= "     <input type='number' id='telefono' class='form-control' value='$telefono'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='direccion'>Dirección </label>";
        $contenidoModal .= "     <textarea  id='direccion' class='form-control'>$direccion</textarea>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='selectgenero'>Genero</label> ";
        $contenidoModal .= "     <select name='selectgenero' id='selectgenero' class='form-control'>";
        $contenidoModal .=                       "<option value='$generoEstudiante'>$nombreGenero</option>";

        $ListaGeneros = $estudiantes->listarGeneros();
        if ($ListaGeneros != null) {
            foreach ($ListaGeneros as $ListaGeneros) {
                $id_genero =  $ListaGeneros['id_genero'];
                $genero =  $ListaGeneros['genero'];

                if ($generoEstudiante != $id_genero) {
                    $contenidoModal .= "<option value='$id_genero'>$genero</option>";
                }
            }
        } else {
            $contenidoModal .=  "<option value='' disabled>no hay perfiles activos.</option>";
        }

        $contenidoModal .=         "</select>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='selectpoblacion'>Población</label> ";
        $contenidoModal .= "     <select name='selectpoblacion' id='selectpoblacion' class='form-control'>";
        $contenidoModal .=                       "<option value='$poblacionEstudiante'>$nombrePoblacion</option>";

        $ListarPoblaciones = $estudiantes->listarPoblaciones();
        if ($ListarPoblaciones != null) {
            foreach ($ListarPoblaciones as $ListarPoblaciones) {
                $id_poblacion =  $ListarPoblaciones['id_poblacion'];
                $poblacion =  $ListarPoblaciones['poblacion'];

                if ($poblacionEstudiante != $id_poblacion) {
                    $contenidoModal .= "<option value='$id_poblacion'>$poblacion</option>";
                }
            }
        } else {
            $contenidoModal .=  "<option value='' disabled>no hay perfiles activos.</option>";
        }

        $contenidoModal .=         "</select>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-row  m-2 mb-4'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='sisben'>Sisben</label>";
        $contenidoModal .= "     <input type='text' id='sisben' class='form-control' value='$sisben'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-group'> ";
        $contenidoModal .= "  <div class='col'>";
        $contenidoModal .= "    <button type='button' id='btn-actualizar-estudiante' class='btn btn-outline-success btn-block rounded-0' >Actualizar estudiante</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $modal->modalForm("Actualizar estudiante", $contenidoModal);
    } else {
        $modal->modalInformativa("error", "Algo salio mal");
    }
} else {
    $modal->modalInformativa("error", "Algo salio mal");
}
