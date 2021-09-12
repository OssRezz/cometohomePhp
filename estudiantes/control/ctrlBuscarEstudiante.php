<?php

require '../../tools/Modal.php';
require '../Modelo/ModeloEstudiantes.php';

$estudiantes = new Estudiantes();
$modal =  new Modal();

$cc_estudiante = $_POST['cc_estudiante'];

if (empty($cc_estudiante) != 1) {

    $Estudiantes = $estudiantes->buscarEstudiantes($cc_estudiante);
    if ($Estudiantes != null) {

        echo "<div class='modal fade table-sm' id='modalSearchStudent' tabindex='-1' style='display: block;' data-keyboard='false'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-md'>";
        echo        "<div class='modal-content'>";

        echo        "<div class='modal-body'>";

        echo                "<table class='table table-hover table-sm border-0 table-light' style='cursor: pointer;'>";
        echo                    "<h5><i class='fas fa-list'></i> Alumnos</h5>";
        echo                    "<hr class='p-0 m-0'>";
        echo                    "<tr>";

        foreach ($Estudiantes as $Estudiantes) {
            $cedula =  $Estudiantes['cc_estudiante'];
            $nombre = strtoupper($Estudiantes['nombre']);
            $telefono =  $Estudiantes['telefono'];
            $fechanaci =  $Estudiantes['fechanaci'];
            $correo =  $Estudiantes['email'];
            $direccion =  $Estudiantes['direccion'];
            $sisben =  $Estudiantes['sisben'];
            $genero =  $Estudiantes['genero'];
            $poblacion =  $Estudiantes['poblacion'];

            echo                            "<td>";
            echo                                "<div class='>d-flex justify-content-between mb-2'>";
            echo                                    "<div class='text-muted'><b>Id:</b> $cedula &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo                                        "<span class='text-muted'><b>Teléfono: </b> $telefono</span>";
            echo                                     "</div>";
            echo                                    "<div>";
            echo                                         "<button type='button' class='btn btn-sm btn-outline-primary border-0' value='$cedula' id='btn-editar-estudiante'><i class='fas fa-edit' style='pointer-events: none;'></i></button>";
            echo                                     "</div>";
            echo                                "</div>";

            echo                                 "<span class='text-primary'>$nombre</span><br>";
            echo                                 "<span class='text-muted'><b>Fecha de nacimiento: </b>$fechanaci <br></span>";
            echo                                 "<span class='text-muted'><b>Correo: </b>$correo <br></span>";
            echo                                 "<span class='text-muted'><b>Dirección: </b>$direccion <br></span>";
            echo                                 "<span class='text-muted'><b>Sisben: </b>$sisben <br><span>";
            echo                                     "<span class='text-muted'><b>Genero: </b>$genero</span>";
            echo                                     "<br></span>";
            echo                                     "<span class='text-muted'><b>Población: </b> $poblacion<br></span>";
            echo                                     "<hr class='p-0 m-0  mt-2'>";
            echo                              "</td>";
            echo                    "</tr>";
        }
        echo               "</table>";
        echo            "</div>";
        echo            "</div>";

        echo        "</div>";
        echo    "</div>";
        echo "<script>$('#modalSearchStudent').modal('show')</script>";
    } else {
        $modal->modalInformativa("Buscar estudiante", "<div class='text-danger'>El estudiante no se encuentra registrado.</div>");
    }
} else {
    $modal->modalInformativa("Buscar estudiante", "<div class='text-primary'>Ingresa el numero de identificacion o nombre del estudiante.</div>");
}
