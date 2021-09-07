<?php
require "../Modelo/ModeloAsisestudiante.php";
require "../../clases/Modelo/ModeloClases.php";

$asisestudiante = new Asisestudiante();
$clases = new Clases();
$date = date('Y-m-d');


?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Asistencia de alumnos</title>
    <script type="text/javascript" src="asisestudianteApp.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-5 pr-0">
            <div id="respuesta">
                <input type="hidden" id="limit" value="<?= $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 10; ?>"></input>
                <input type="hidden" id="pagina" value="<?= $pagina = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1; ?>"></input>
            </div>

            <div class="col-12 d-flex justify-content-end align-items-end px-0">
                <button class="btn btn-danger rounded-0"><i class="fas fa-times"></i> Cerrar Sesión</button>
            </div>

            <!--logo-->
            <div class="col d-flex align-items-center pb-4">
                <img src="../../images/logo.gif" height="110" alt="">
            </div>


        </div>


        <!--Links-->
        <script src="../../roles/App/script.js"></script>
        <div id="navbar"></div>

        <!---->
        <div class="row d-flex justify-content-center align-items-start py-3">

            <div class="card mx-3 rounded-0 mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-check"></i> Tomar asistencia de alumno</h5>
                </div>

                <div class="card-body">

                    <form class="form" action="" method="POST">

                        <div class="form-row">
                            <div class="col">
                                <label for="cedula">Cédula</label>
                                <input type="text" name="cedula" id="cedula" placeholder="Ingresar cedula" class="form-control">
                            </div>
                        </div>

                        <div class="form-row my-3">
                            <div class="col">
                                <label for="selectClase">Clase</label>
                                <select name="selectClases" class="form-control" id="selectClases">
                                    <?php
                                    $Clases = $clases->listarClases();
                                    if ($Clases != null) {
                                        foreach ($Clases as $Clases) {
                                    ?>
                                            <option value="<?php echo $Clases['id_clase'] ?>"><?php echo $Clases['grupo'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col">
                                <label for="fechaClase">Fecha de la clase</label>
                                <input type="date" name="fechaClase" id="fechaClase" value="<?php echo $date ?>" class="form-control">
                            </div>
                            <div class="col">
                                <label for="selectAsistencia">¿Asistió?</label>
                                <select name="selectAsistencia" id="selectAsistencia" class="form-control">
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <button type="button" id="btn-ingresar-asisestudiante" class="btn btn-outline-success btn-block rounded-0">Registrar asistencia</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="card rounded-0 border-0">
                <table class='table table-hover table-sm table-responsive border'>
                    <tr>
                        <th>Cédula </th>
                        <th>Estudiante</th>
                        <th>Clase</th>
                        <th>N~ De clases</th>
                        <th>Asistencias</th>
                        <th>Fecha</th>
                    </tr>
                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Asisestudiante = $asisestudiante->listarAsisestudiantePagination($paginationStart, $limit);

                        if ($Asisestudiante != null) {
                            foreach ($Asisestudiante as $Asisestudiante) {
                        ?>
                                <td><?php echo $Asisestudiante['cc_estudiante'] ?></td>
                                <td><?php echo $Asisestudiante['nombre'] ?></td>
                                <td><?php echo $Asisestudiante['grupo'] ?></td>
                                <td><?php echo $Asisestudiante['numeroclases'] ?></td>
                                <td><?php echo $Asisestudiante['asistencia'] ?></td>
                                <td><?php echo $Asisestudiante['fecha'] ?></td>
                    </tr>
            <?php }
                        } ?>
                </table>
                <!-- Pagination -->
                <div class="col d-flex justify-content-center" id="paginacion"></div>
            </div>

        </div>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>