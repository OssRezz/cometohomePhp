<?php
require '../Modelo/ModeloEventos.php';
$eventos = new Eventos();
require '../../usuarios/Modelo/ModeloUsuarios.php';

$usuario = new Usuarios();
$date = date('Y-m-d');
$Tiempo = date("H:i", strtotime('time_d'));
$usuario->sessionProfesor();
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Eventos</title>
    <script src="eventosApp.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-5 pr-0">
            <div id="respuesta">
                <input type="hidden" id="limit" value="<?= $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 3; ?>"></input>
                <input type="hidden" id="pagina" value="<?= $pagina = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1; ?>"></input>
                <input type="hidden" id="perfilUsuario" value="<?= $usuario->getPerfil() ?>"></input>
            </div>

            <div class="col-12 d-flex justify-content-end align-items-end px-0">
                <button id="btn-logOut" type="button" class="btn btn-danger rounded-0"><i class="fas fa-times"></i> Cerrar Sesión</button>
            </div>

            <!--logo-->
            <div class="col d-flex align-items-center pb-4">
                <img src="../../images/logo.gif" height="110" alt="">
            </div>

            <h5><?php echo $usuario->getUsuario() ?></h5>

        </div>


        <!--Links-->
        <script src="../../roles/App/script.js"></script>
        <div class='row bg-dark mb-5 d-flex justify-content-center sticky-top' id="navbar"></div>

        <!---->
        <div class="row d-flex justify-content-center py-3">
            <div class="card mx-3 mb-5 rounded-0" style="width: 23rem;">

                <div class="card-header">
                    <h5><i class="fas fa-plus"></i> Registrar evento</h5>
                </div>
                <div class="card-body">

                    <div class="form-group mb-2">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Ingresar nombre del evento" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del evento..." rows="3"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" id="fecha" value="<?php echo $date ?>" class="form-control">
                    </div>
                    <div class="form-row mb-4">

                        <div class="col">
                            <label for="horainicio">Hora inicio</label>
                            <input type="time" name="horainicio" id="horainicio" value="<?php echo $Tiempo ?>" class="form-control">
                        </div>
                        <div class="col">
                            <label for="horafin">Hora fin</label>
                            <input type="time" name="horafin" id="horafin" value="<?php echo $Tiempo ?>" class="form-control">
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="button" id="btn-ingresar-evento" class="btn btn-outline-success btn-block rounded-0">Registrar evento</button>
                    </div>

                    <div id="respuesta"></div>
                </div>


            </div>

            <div class="card border-0  rounded-0 mx-4" style="width: 26rem;">

                <table class='table table-hover table-sm border-0 table-light' style="cursor: pointer;">

                    <h5><i class="fas fa-list"></i> Eventos</h5>
                    <hr class="p-0 m-0">

                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Eventos = $eventos->listarEventosPagination($paginationStart, $limit);

                        if ($Eventos != null) {
                            foreach ($Eventos as $Eventos) {
                        ?>


                                <td>
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="text-muted" style="font-size: 14px;"><b>Desde</b> <?php echo $Eventos['horainicio'] ?>Hrs
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="text-muted"><b>hasta </b><?php echo $Eventos['horafin'] ?>Hrs</span>
                                        </div>
                                        <div>
                                            <button type='button' class='btn btn-sm btn-outline-primary border-0' value='<?php echo $Eventos['id_evento'] ?>' id='btn-editar-evento'><i class='fas fa-edit' style='pointer-events: none;'></i></button>
                                            <button type='button' class='btn btn-sm btn-outline-danger border-0' value='<?php echo $Eventos['id_evento'] ?>' id='btn-modalEliminar-evento'><i class='fas fa-trash' style='pointer-events: none;'></i></button>

                                        </div>
                                    </div>

                                    <span class="text-primary"><?php echo strtoupper($Eventos['nombre']) ?></span><br>
                                    <span class="font-weight-normal text-muted" style="font-size: 14px;">Fecha del evento <?php echo $Eventos['fecha'] ?></span><br><br>
                                    <span class="text-muted" style="font-size: 14px;"><b>Descripción:</b> <?php echo $Eventos['descripcion'] ?><br></span>
                                    <hr class="p-0 m-0  mt-2">
                                </td>
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