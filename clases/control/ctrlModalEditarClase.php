<?php
require '../../tools/Modal.php';
require '../Modelo/ModeloClases.php';

$clases = new Clases();
$modal = new Modal();
$id_clase = $_POST['id_clase'];


if ($id_clase != null) {
    $Clase = $clases->MostrarClaseById($id_clase);
    if ($Clase != null) {
        foreach ($Clase as $Clase) {
            $grupo = $Clase['grupo'];
            $numeroclases = $Clase['numeroclases'];
            $fechainicio = $Clase['fechainicio'];
            $fechafin = $Clase['fechafin'];
            $estado = $Clase['estado'];
        }

        //Building modal content
        $contenidoModal = "<div class='form-group mb-2'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='grupoClase'>Nombre grupo</label>";
        $contenidoModal .= "     <input type='number' id='idClase' class='form-control' value='$id_clase' hidden>";
        $contenidoModal .= "     <input type='text' id='grupoClase' class='form-control' value='$grupo'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group mb-2'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='numeroClases'>N° de clases </label>";
        $contenidoModal .= "     <input type='number' id='numeroClases' value='$numeroclases' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-row m-2 mb-2'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='fechaInicio'>Fecha de inicio</label>";
        $contenidoModal .= "     <input type='date' id='fechaInicio' value='$fechainicio' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='fechaFinal'>Fecha final</label>";
        $contenidoModal .= "     <input type='date' id='fechaFinal' value='$fechafin' class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-row  m-2 mb-4'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='estadoClase'>Estado</label>";
        $contenidoModal .= "<select name='estadoClase' id='estadoClase' class='form-control'>";;

        if ($estado === "1") {
            $contenidoModal .= "<option value'1' selected>Activo</option>";
            $contenidoModal .= "<option value'2'>Inativo</option>";
        } else {
            $contenidoModal .= "<option value'2' selected>Inativo</option>";
            $contenidoModal .= "<option value'1'>Activo</option>";
        }

        $contenidoModal .= "</select>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-group'> ";
        $contenidoModal .= "  <div class='col'>";
        $contenidoModal .= "    <button type='button' id='btn-actualizar-clase' class='btn btn-outline-success btn-block rounded-0' >Actualizar clase</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $modal->modalForm("Actualizar sede", $contenidoModal);
    } else {
        $modal->modalInformativa("error", "Algo salió mal en la base de datos");
    }
} else {
    $modal->modalInformativa("error", "Algo salió mal");
}
