<?php
require "../Modelo/ModeloAsisprofesor.php";
require "../../clases/Modelo/ModeloClases.php";
require '../../usuarios/Modelo/ModeloUsuarios.php';

$usuario = new Usuarios();
$asisprofesor = new Asisprofesor();
$clases = new Clases();
$date = date('Y-m-d');
$usuario->sessionAdmin();

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Asistencia de Profesores</title>
    <script type="text/javascript" src="asisprofeApp.js"></script>

    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-md-2 pr-0 pb-3">

            <div id="respuesta">
                <input type="hidden" id="limit" value="<?= $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 10; ?>"></input>
                <input type="hidden" id="pagina" value="<?= $pagina = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1; ?>"></input>
                <input type="hidden" id="perfilUsuario" value="<?= $usuario->getPerfil() ?>"></input>
            </div>

            <!--botón cerrar-->
            <div class="col-12 d-flex justify-content-end align-items-end p-0">
                <button id="btn-logOut" type="button" class="btn btn-danger rounded-0"><i class="fas fa-times"></i> Cerrar Sesión</button>
            </div>

            <!--logo-->
            <div class="col d-flex align-items-center p-0">
                <img src="../../images/logo.gif" height="110" alt="">
            </div>
        </div>

        <div class="row px-3 py-2 bgcc">
                <!--perfil-->
                <div class="card border-0 rounded-pill bg-card-perfil" style="width: 23rem;">                    
                    <div class="card-body p-0 d-flex justify-content-between">
                        <div class="col-1 ml-3 my-2 d-flex justify-content-center align-items-center">
                            <i class="fas fa-user-circle fa-3x text-white" style="opacity: 0.7;"></i>
                        </div>
                        <div class="col">
                            <div class="m-0 mt-1" style="font-size: 16px;"> <?php echo $usuario->getUsuario() ?></div>
                            <div class="m-0" style="font-size: 16px;"> <?php echo $usuario->getCorreo() ?></div>
                        </div>
                    </div>
               </div>
        </div>


        <!--Links-->
        <script src="../../roles/App/script.js"></script>
        <div class='row bg-dark mb-5 d-flex justify-content-center sticky-top' id="navbar"></div>

        <!---->
        <div class="row d-flex justify-content-center align-items-start py-3">

            <div class="card mx-3 rounded-0 mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-check"></i> Tomar asistencia de profesor</h5>
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
                                <label for="selectClases">Clase</label>
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
                                <button type="button" id="btn-ingresar-asisprofe" class="btn btn-outline-success btn-block rounded-0">Registrar asistencia</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <div class="card rounded-0 border-0 mx-4" style="width: 26rem;">
                <table class='table table-hover table-sm border-0 table-light' style="cursor: pointer;">

                    <h5><i class="fas fa-list"></i> Lista de Asistencia de profesores</h5>
                    <hr class="p-0 m-0">
                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Asisprofesor = $asisprofesor->listarAsisprofesorPagination($paginationStart, $limit);

                        if ($Asisprofesor != null) {
                            foreach ($Asisprofesor as $Asisprofesor) {
                        ?>

                                <td colspan="6">

                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="text-muted"><b>Id:</b> <?php echo $Asisprofesor['cc_profesor'] ?></div>
                                        <div>
                                            <span class="text-muted"><b>Fecha: </b><?php echo $Asisprofesor['fecha'] ?></span>
                                        </div>
                                    </div>

                                    <span class="text-primary"><?php echo strtoupper($Asisprofesor['nombre']) ?></span><br>
                                    <span class="text-muted"><b>Grupo: </b><?php echo $Asisprofesor['grupo'] ?><br></span>
                                    <span class="text-muted"><b>Número de clases: </b><?php echo $Asisprofesor['numeroclases'] ?><br></span>
                                    <b class="text-muted">Asistencias: </b><span class="text-muted"> <?php echo $Asisprofesor['asistencia'] ?><br></span>
                                </td>

                    </tr>
            <?php }
                        } ?>
                </table>
                <!-- Pagination -->
                <div class="col d-flex justify-content-center" id="paginacion"></div>
            </div>




        </div>


        <div class="row d-flex justify-content-center ">

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>