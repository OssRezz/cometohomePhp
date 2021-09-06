<?php

require '../Modelo/ModeloSedes.php';
require '../../tools/Modal.php';

$sedes = new Sedes();
$modal = new Modal();

$sede = $_POST['sede'];


if ($sede != null) {
    $Sede = $sedes->MostrarSedesById($sede);
    if ($Sede != null) {
        foreach ($Sede as $Sede) {
            $nombre = $Sede['nombre'];
        }

        //Building modal content
        $contenidoModal = "¿Eliminar la sede: $nombre?";
        $contenidoModal .= "<div class='row d-flex justify-content-end p-3'> ";
        $contenidoModal .= "    <div class='col-5'>";
        $contenidoModal .= "        <button type='button' id='btn-cancelar' class='btn btn-outline-primary btn-block rounded-0' >Cancelar</button>";
        $contenidoModal .= "    </div> ";
        $contenidoModal .= "    <div class='col-5'>";
        $contenidoModal .= "        <button type='button' id='btn-eliminar-sede' value='$sede' class='btn btn-outline-danger  btn-block rounded-0' >Eliminar Sede</button>";
        $contenidoModal .= "    </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<script>$('#btn-cancelar').click(function(){location.reload()});</script>";


        $modal->modalForm("Eliminar sede", $contenidoModal);
    } else {
        $modal->modalInformativa("error", "Algo salió mal en la base de datos");
    }
} else {
    $modal->modalInformativa("error", "Algo salió mal");
}
