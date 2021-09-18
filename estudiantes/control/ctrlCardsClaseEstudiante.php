<?php

require '../Modelo/ModeloEstudiantes.php';
require '../../tools/Card.php';
$estudiantes = new Estudiantes();
$card = new Card();

$cc_estudiante = $_POST['idenEstudiante'];

$grupoEstudiante = $estudiantes->tarjetaEstudiantes($cc_estudiante);

if ($grupoEstudiante != null) {
    foreach ($grupoEstudiante as $grupoEstudiante) {
        $grupo = $grupoEstudiante['grupo'];
        $escuela = $grupoEstudiante['escuela'];
        $programa = $grupoEstudiante['programa'];
        $profesor = $grupoEstudiante['profesor'];
        $correo = $grupoEstudiante['correo'];
        $sede = $grupoEstudiante['sede'];
        $estado = $grupoEstudiante['estado'];

        $card->tarjetaEstudiantes($grupo, $escuela, $programa, $profesor, $correo, $sede, $estado);
    }
} else {
    echo "<h5 class='text-primary'>No estas matriculado en ningún programa.</h5>";
}
