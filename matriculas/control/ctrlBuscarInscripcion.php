<?php

require '../../tools/Modal.php';
require '../Modelo/ModeloMatriculas.php';

$matriculas = new Matriculas();
$modal =  new Modal();

$cc_estudiante = $_POST['cc_estudiante'];

if (empty($cc_estudiante) != 1) {

    $Inscripciones = $matriculas->buscarInscripciones($cc_estudiante);
    if ($Inscripciones != null) {

        echo "<div class='modal fade table-sm' id='modalSearchStudent' tabindex='-1' style='display: block;' data-keyboard='false'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-md'>";
        echo        "<div class='modal-content'>";

        echo        "<div class='modal-body'>";

        echo                "<table class='table table-hover table-sm border-0 table-light' style='cursor: pointer;'>";
        echo                    "<h5><i class='fas fa-list'></i> Matrículas</h5>";
        echo                    "<hr class='p-0 m-0'>";
        echo                    "<tr>";

        foreach ($Inscripciones as $Inscripciones) {
            $fecha =  $Inscripciones['fecha'];
            $estudiante = strtoupper($Inscripciones['estudiante']);
            $cc_estudiante =  $Inscripciones['cc_estudiante'];
            $id_inscripcion =  $Inscripciones['id_inscripcion'];
            $telefono =  $Inscripciones['telefono'];
            $programa =  $Inscripciones['programa'];

            echo                            "<td colspan='6'>";
            echo                                "<div class='>d-flex justify-content-between mb-2'>";
            echo                                    "<div>Fecha: $fecha</div>";
            echo                                "<div>";
            if ($Inscripciones['matriculado'] != "1") {
                echo                                "<button type='button' class='btn btn-sm btn-outline-primary' value='$id_inscripcion' id='btn-matricular'><i class='fas fa-user-graduate' style='pointer-events: none;'></i> Matricular</button>";
            } else {
                echo                                "<span class='text-success'><i class='far fa-check-square' style='pointer-events: none;'></i> Matriculado</span>";
            }
            echo                                 "</div>";
            echo                                 "</div>";

            echo                                 " <span class='text-muted'><b>Id:</b> <?php echo $cc_estudiante</span><br>";
            echo                                 "<b class='text-muted'>Estudiante:</b><span class='text-primary' style='font-size: 14px;'> $estudiante</span><br>";
            echo                                 "<span class='text-muted'><b>Teléfono:</b> $telefono </span><br>";
            echo                                 "<span class='text-muted'><b>Programa:</b> $programa</span><br>";
            echo                              "<hr class='p-0 m-0  mt-2'>";

            echo                            "</td>";
            echo                "</tr>";
        }

        echo               "</table>";
        echo            "</div>";
        echo          "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "<script>$('#modalSearchStudent').modal('show')</script>";
    } else {
        $modal->modalInformativa("Buscar inscripciónes", "<div class='text-danger'>El estudiante no se encuentra inscripto a ningún programa.</div>");
    }
} else {
    $modal->modalInformativa("Buscar inscripciónes", "<div class='text-primary'>Ingresa el numero de identificación o nombre del estudiante.</div>");
}
