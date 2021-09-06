<?php

require '../Modelo/ModeloProgramas.php';
require '../../tools/Card.php';
$programas = new Programas();
$card = new Card();

$Programas = $programas->listarProgramasPorEscuela(1);

if ($Programas != null) {
    foreach ($Programas as $Programas) {
        $id_programa = $Programas['id_programa'];
        $nombrePrograma = $Programas['nombre'];
        $escuela = $Programas['escuela'];
        $sede = $Programas['nombreSede'];
        $fecha = $Programas['fechainicio'];
        $edad = $Programas['edad'];
        $horario = $Programas['horario'];

        $card->tarjeta($id_programa, $nombrePrograma, $escuela, $sede, $fecha, $edad, $horario);
    }
} else {
    echo "Actualmente no hay programas de musica disponible";
}
