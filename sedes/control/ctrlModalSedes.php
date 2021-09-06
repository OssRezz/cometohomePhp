<?php

require '../Modelo/ModeloSedes.php';
require '../../tools/Modal.php';

$sedes = new Sedes();
$modal = new Modal();

$id_sede = $_POST['id_sede'];


if ($id_sede != null) {
    $Sede = $sedes->MostrarSedesById($id_sede);
    if ($Sede != null) {
        foreach ($Sede as $Sede) {
            $id_Sede = $Sede['id_sede'];
            $nombre = $Sede['nombre'];
            $direccion = $Sede['direccion'];
            $telefono = $Sede['telefono'];
            $aula = $Sede['aula'];
        }

        //Building modal content
        $contenidoModal = "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='nombreSede'>Nombre sede</label>";
        $contenidoModal .= "     <input type='number' id='idSede' class='form-control' value='$id_Sede' hidden>";
        $contenidoModal .= "     <input type='text' id='nombreSede' class='form-control' value='$nombre'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='direccionSede'>Dirección</label>";
        $contenidoModal .= "     <textarea name='direccionSede' id='direccionSede' class='form-control' rows='3'>$direccion</textarea";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='telefonoSede'>Teléfono </label>";
        $contenidoModal .= "     <input type='number' id='telefonoSede' value='$telefono' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='aulaSede'>Aula</label>";
        $contenidoModal .= "     <input type='text' id='aulaSede' value='$aula' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-group'> ";
        $contenidoModal .= "  <div class='col'>";
        $contenidoModal .= "    <button type='button' id='btn-actualizar-sede' class='btn btn-outline-success btn-block rounded-0' >Actualizar sede</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $modal->modalForm("Actualizar sede", $contenidoModal);
    } else {
        $modal->modalInformativa("error", "Algo salió mal en la base de datos");
    }
} else {
    $modal->modalInformativa("error", "Algo salió mal");
}
