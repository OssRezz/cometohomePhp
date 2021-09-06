<?php
require '../../tools/Modal.php';
require '../../programas/Modelo/ModeloProgramas.php';
$modal =  new Modal();
$programa = new Programas();
$date = date('Y-m-d');

$id_programa = $_POST['programa'];


if ($id_programa != null) {
    $Programa = $programa->MostrarProgramaPorId($id_programa);
    if ($Programa != null) {
        foreach ($Programa as $Programa) {
            $nombrePrograma = $Programa['nombre'];
        }
        //Building modal content
        $contenidoModal = "<div class='alert alert-info' role='alert'>";
        $contenidoModal .= $nombrePrograma;
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='fecha'>Fecha</label>";
        $contenidoModal .= "     <input type='number' id='idPrograma' value='$id_programa'  hidden>";
        $contenidoModal .= "     <input type='date' id='fecha' value='$date' class='form-control' disabled>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='cedula'>Identificación </label> ";
        $contenidoModal .= "     <input type='number' id='cedula' placeholder='Numero de identificacion' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'> ";
        $contenidoModal .= "  <div class='col'>";
        $contenidoModal .= "    <button type='button' id='btn-insertar-inscripcion' class='btn btn-outline-success btn-block rounded-0' >Ingresar inscripcion</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $modal->modalForm("Inscipcion de programas", $contenidoModal);
    } else {
        $modal->modalInformativa("Informacion", "Algo salio mal");
    }
} else {
    $modal->modalInformativa("Informacion", "Algo salio mal");
}
