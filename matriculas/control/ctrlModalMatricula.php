<?php
require '../../tools/Modal.php';
require '../Modelo/ModeloMatriculas.php';
$modal =  new Modal();
$matriculas = new Matriculas();
$date = date('Y-m-d');

$id_inscripcion = $_POST['id_inscripcion'];


if ($id_inscripcion != null) {
    $inscripcion = $matriculas->MostrarInscripcionesById($id_inscripcion);
    if ($inscripcion != null) {
        foreach ($inscripcion as $inscripcion) {
            $estudiante = $inscripcion['estudiante'];
        }

        //Building modal content
        $contenidoModal = "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='fecha'>Fecha de matricula</label>";
        $contenidoModal .= "     <input type='date' id='fecha' class='form-control' value='$date' disabled>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='estudiante'>Nombre estudiante</label>";
        $contenidoModal .= "     <input type='number' id='id_inscripcion' value='$id_inscripcion'  hidden>";
        $contenidoModal .= "     <input type='text' id='estudiante' class='form-control' value='$estudiante' disabled>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='valorpago'>Valor de pago</label>";
        $contenidoModal .= "     <input type='number' id='valorpago' class='form-control' placeholder='Valor a pagar del estudiante'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='cedula'>Identificación profesor</label> ";
        $contenidoModal .= "     <input type='number' id='cedula' placeholder='Numero de identificacion del profesor' class='form-control'>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='cedula'>Clase</label> ";
        $contenidoModal .= "     <select name='selectClase' id='selectClase' class='form-control'>";
        // $contenidoModal .=                       "<option value='$id_perfil'>$nombrePerfil</option>";

        $clases = $matriculas->listarClases();
        if ($clases != null) {
            foreach ($clases as $clases) {
                $id_clase =  $clases['id_clase'];
                $grupo =  $clases['grupo'];
                $contenidoModal .= "<option value='$id_clase'>$grupo</option>";
            }
        } else {
            $contenidoModal .=  "<option value='' disabled>no hay clases activas.</option>";
        }

        $contenidoModal .=                        "</select>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'> ";
        $contenidoModal .= "  <div class='col'>";
        $contenidoModal .= "    <button type='button' id='btn-insertar-matricula' class='btn btn-outline-success btn-block rounded-0' >Matricular estudiante</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $modal->modalForm("Formulario de matricula", $contenidoModal);
    } else {
        $modal->modalInformativa("Informacion", "Algo asdas mal");
    }
} else {
    $modal->modalInformativa("Informacion", "Algo salio mal");
}
