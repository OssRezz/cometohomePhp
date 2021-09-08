<?php

require '../Modelo/ModeloEventos.php';
require '../../tools/Modal.php';

$eventos = new Eventos();
$modal = new Modal();

$id_evento = $_POST['evento'];


if ($id_evento != null) {
    $Eventos = $eventos->MostrarEventosById($id_evento);
    if ($Eventos != null) {
        foreach ($Eventos as $Eventos) {
            $nombre = $Eventos['nombre'];
            $descripcion = $Eventos['descripcion'];
            $fecha = $Eventos['fecha'];
            $horainicio = $Eventos['horainicio'];
            $horafin = $Eventos['horafin'];
        }

        //Building modal content
        $contenidoModal = "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='nombreEvento'>Nombre evento</label>";
        $contenidoModal .= "     <input type='number' id='id_evento' class='form-control' value='$id_evento' hidden>";
        $contenidoModal .= "     <input type='text' id='nombreEvento' class='form-control' value='$nombre'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='descripcionEvento'>Descripción</label>";
        $contenidoModal .= "     <textarea name='descripcionEvento' id='descripcionEvento' class='form-control' rows='3'>$descripcion</textarea";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='fechaEvento'>Teléfono </label>";
        $contenidoModal .= "     <input type='date' id='fechaEvento' value='$fecha' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='inicioEvento'>Hora inicio</label>";
        $contenidoModal .= "     <input type='time' id='inicioEvento' value='$horainicio' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='finEvento'>Hora fin</label>";
        $contenidoModal .= "     <input type='time' id='finEvento' value='$horafin' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-group'> ";
        $contenidoModal .= "  <div class='col'>";
        $contenidoModal .= "    <button type='button' id='btn-actualizar-evento' class='btn btn-outline-success btn-block rounded-0' >Actualizar evento</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $modal->modalForm("Actualizar evento", $contenidoModal);
    } else {
        $modal->modalAlerta("Actualizar evento", "danger", "Algo salió mal en la base de datos");
    }
} else {
    $modal->modalInformativa("Actualizar evento", "danger",  "Algo salió mal");
}
