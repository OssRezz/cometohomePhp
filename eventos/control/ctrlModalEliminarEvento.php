<?php


require '../Modelo/ModeloEventos.php';
require '../../tools/Modal.php';

$eventos = new Eventos();
$modal = new Modal();

$evento = $_POST['evento'];


if ($evento != null) {
    $Evento = $eventos->MostrarEventosById($evento);
    if ($Evento != null) {
        foreach ($Evento as $Evento) {
            $nombre = $Evento['nombre'];
        }

        //Building modal content
        $contenidoModal = "¿Eliminar el evento: $nombre?";
        $contenidoModal .= "<div class='row d-flex justify-content-end p-3'> ";
        $contenidoModal .= "    <div class='col-5'>";
        $contenidoModal .= "        <button type='button' id='btn-cancelar' class='btn btn-outline-primary btn-block rounded-0' >Cancelar</button>";
        $contenidoModal .= "    </div> ";
        $contenidoModal .= "    <div class='col-5'>";
        $contenidoModal .= "        <button type='button' id='btn-eliminar-evento' value='$evento' class='btn btn-outline-danger  btn-block rounded-0' >Eliminar evento</button>";
        $contenidoModal .= "    </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<script>$('#btn-cancelar').click(function(){location.reload()});</script>";


        $modal->modalForm("Eliminar evento", $contenidoModal);
    } else {
        $modal->modalAlerta("Eliminar evento", "danger", "Algo salió mal en la base de datos");
    }
} else {
    $modal->modalAlerta("Eliminar evento", "danger", "Algo salió mal");
}
