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
        $contenidoModal = "<div class='col  text-center'><span>Inscripción para el programa:</span></div>";
        $contenidoModal .= "<div class='col text-info font-weight-bolder display-4 text-center mb-4' style='font-size:19px;'>";
        $contenidoModal .= $nombrePrograma;
        $contenidoModal .= "</div>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <input type='number' id='idPrograma' value='$id_programa'  hidden>";
        $contenidoModal .= "     <input type='date' id='fecha' value='$date' hidden>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "<div class='col mt-4'>Ingrese a continuación el número de identificación con el que se encuentra registrado.</div>";
        $contenidoModal .= " <div class='col mt-2'>";
        $contenidoModal .= "     <input type='number' id='cedula' placeholder='Numero de identificación' class='form-control border border-info'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'> ";
        $contenidoModal .= "  <div class='col d-flex justify-content-center'>";
        $contenidoModal .= "    <button type='button' id='btn-insertar-inscripcion' class='btn btn-outline-success rounded-0' >Continuar</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $modal->modalForm("", $contenidoModal);
    } else {
        $modal->modalInformativa("Informacion", "Algo salio mal");
    }
} else {
    $modal->modalInformativa("Informacion", "Algo salio mal");
}
