<?php

require '../../tools/Modal.php';
require '../Modelo/ModeloProgramas.php';
require '../../sedes/Modelo/ModeloSedes.php';

$sedes =  new Sedes();
$programas = new Programas();
$modal = new Modal();

$id_programa = $_POST['programa'];


if ($id_programa != null) {
    $Programas = $programas->MostrarProgramaPorId($id_programa);
    if ($Programas != null) {
        foreach ($Programas as $Programas) {
            $id_escuelaPrograma = $Programas['id_escuela'];
            $escuelaPrograma = $Programas['escuela'];
            $nombre = $Programas['nombre'];
            $edad = $Programas['edad'];
            $id_sedePrograma = $Programas['id_sede'];
            $nombreSede = $Programas['nombreSede'];
            $cupos = $Programas['cupos'];
            $costo = $Programas['costo'];
            $fechainicio = $Programas['fechainicio'];
            $fechafin = $Programas['fechafin'];
            $horario = $Programas['horario'];
            $estado = $Programas['estado'];
        }
        //Building modal content
        $contenidoModal = "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='selectescuelaPrograma'>Escuela</label> ";
        $contenidoModal .= "     <select name='selectescuelaPrograma' id='selectescuelaPrograma' class='form-control'>";
        $contenidoModal .=                       "<option value='$id_escuelaPrograma'>$escuelaPrograma</option>";

        $listaDeEscuelas = $programas->listarEscuela();
        if ($listaDeEscuelas != null) {
            foreach ($listaDeEscuelas as $listaDeEscuelas) {
                $id_escuela =  $listaDeEscuelas['id_escuela'];
                $escuela =  $listaDeEscuelas['escuela'];

                if ($id_escuelaPrograma != $id_escuela) {
                    $contenidoModal .= "<option value='$id_escuela'>$escuela</option>";
                }
            }
        } else {
            $contenidoModal .=  "<option value='' disabled>no hay perfiles activos.</option>";
        }

        $contenidoModal .=         "</select>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='nombrePrograma'>Nombre</label>";
        $contenidoModal .= "     <input type='number' id='id_programa' class='form-control' value='$id_programa' hidden>";

        $contenidoModal .= "     <input type='text' id='nombrePrograma' class='form-control' value='$nombre'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='edadPrograma'>Edad</label>";
        $contenidoModal .= "     <input type='text' id='edadPrograma' class='form-control' value='$edad'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-group'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='selectsedePrograma'>Sede</label> ";
        $contenidoModal .= "     <select name='selectsedePrograma' id='selectsedePrograma' class='form-control'>";
        $contenidoModal .=                       "<option value='$id_sedePrograma'>$nombreSede</option>";

        $Sedes = $sedes->listarSedes();
        if ($Sedes != null) {
            foreach ($Sedes as $Sedes) {
                $id_sede =  $Sedes['id_sede'];
                $sede =  $Sedes['nombre'];

                if ($id_sedePrograma != $id_sede) {
                    $contenidoModal .= "<option value='$id_sede'>$sede</option>";
                }
            }
        } else {
            $contenidoModal .=  "<option value='' disabled>no hay perfiles activos.</option>";
        }

        $contenidoModal .=       "</select>";
        $contenidoModal .= " </div>";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-group mb-2'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='cuposPrograma'>Cupos</label>";
        $contenidoModal .= "     <input type='number' id='cuposPrograma' class='form-control' value='$cupos'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";
        $contenidoModal .= "<div class='form-group mb-2'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='costoPrograma'>Costo</label>";
        $contenidoModal .= "     <input type='number' id='costoPrograma' class='form-control' value='$costo'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-group mb-2'>";


        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-row m-2'>";
        $contenidoModal .= "    <div class='col'>";
        $contenidoModal .= "        <label for='fechaIniPrograma'>Fecha de inicio</label>";
        $contenidoModal .= "        <input type='date' id='fechaIniPrograma' class='form-control' value='$fechainicio'>";
        $contenidoModal .= "    </div> ";
        $contenidoModal .= "    <div class='col'>";
        $contenidoModal .= "     <label for='fechaFinPrograma'>Fecha de fin</label>";
        $contenidoModal .= "     <input type='date' id='fechaFinPrograma' class='form-control' value='$fechafin'>";
        $contenidoModal .= "    </div> ";
        $contenidoModal .= "</div>";

        $contenidoModal .= "<div class='form-row  m-2 mb-4'>";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='horarioPrograma'>Horario</label>";
        $contenidoModal .= "     <input type='text' name='horarioPrograma' id='horarioPrograma' value='$horario'  class='form-control'>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= " <div class='col'>";
        $contenidoModal .= "     <label for='estadoPrograma'>Estado</label>";
        $contenidoModal .= "<select name='estadoPrograma' id='estadoPrograma' class='form-control'>";;

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
        $contenidoModal .= "    <button type='button' id='btn-actualizar-programa' class='btn btn-outline-success btn-block rounded-0' >Actualizar programa</button>";
        $contenidoModal .= " </div> ";
        $contenidoModal .= "</div>";

        $modal->modalForm("Actualizar programa", $contenidoModal);
    } else {
        $modal->modalInformativa("error", "Algo asdas mal");
    }
} else {
    $modal->modalInformativa("error", "Algo salio mal");
}
