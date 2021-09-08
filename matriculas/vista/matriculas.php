<?php
require '../Modelo/ModeloMatriculas.php';

$matriculas = new Matriculas();
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="matriculasApp.js"></script>

    <title>Matriculas</title>

    <link rel="stylesheet" href="../../css/style.css">

</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-5 pr-0">
            <div id="respuesta">
                <input type="hidden" id="limit" value="<?= $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 4; ?>"></input>
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
        <div class="row d-flex justify-content-center py-3">

            <div class="card rounded-0 border-0 mx-4"   style="width: 26rem;">

                <div class="card-body px-0">

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Ingrese id o nombre del alumno" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-secondary" type="button" id="btn-buscar"><i class="fas fa-search"></i> Buscar</button>
                      </div>
                    </div>
                    
                </div>


                <table class='table table-hover table-sm  border-0 table-light' style="cursor: pointer;">

                     <h5><i class="fas fa-list"></i> Matrículas</h5><hr class="p-0 m-0">

                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Inscripciones = $matriculas->listarInscripciones($paginationStart, $limit);

                        if ($Inscripciones != null) {
                            foreach ($Inscripciones as $Inscripciones) {
                        ?>

                        <td colspan="6">

                            <div class="d-flex justify-content-between mb-2">  
                                <div>Fecha: <?php echo $Inscripciones['fecha'] ?></div>

                                <div>
                                    <?php if ($Inscripciones['matriculado'] != "1") { ?>
                                        <button type='button' class='btn btn-sm btn-outline-primary' value='<?php echo  $Inscripciones['id_inscripcion'] ?>' id='btn-matricular'><i class='fas fa-user-graduate' style='pointer-events: none;'></i> Matricular</button>
                                    <?php } else { ?>
                                        <span class="text-success"><i class='far fa-check-square' style='pointer-events: none;'></i> Matriculado</span>
                                    <?php } ?>
                                </div>
                            </div> 
                            <span class="text-muted"><b>Id:</b> <?php echo $Inscripciones['cc_estudiante'] ?></span><br>
                            <b class="text-muted">Estudiante:</b><span class="text-primary" style="font-size: 14px;"> <?php echo strtoupper($Inscripciones['estudiante']) ?></span><br>
                            <span class="text-muted"><b>Teléfono:</b> <?php echo $Inscripciones['telefono'] ?></span><br>
                            <span class="text-muted"><b>Programa:</b> <?php echo $Inscripciones['programa'] ?></span><br>




                             <hr class="p-0 m-0  mt-2">
                        </td>


                                <!--td><?php echo $Inscripciones['fecha'] ?></td>
                                <td><?php echo $Inscripciones['cc_estudiante'] ?></td>
                                <td><?php echo $Inscripciones['estudiante'] ?></td>
                                <td><?php echo $Inscripciones['telefono'] ?></td>
                                <td><?php echo $Inscripciones['programa'] ?></td>
                                <td-->
                    </tr>
            <?php
                            }
                        }
            ?>
                </table>
                <!-- Pagination -->
                <div class="col d-flex justify-content-center" id="paginacion"></div>

            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>