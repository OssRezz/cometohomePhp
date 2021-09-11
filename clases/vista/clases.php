<?php
require '../Modelo/ModeloClases.php';
require '../../usuarios/Modelo/ModeloUsuarios.php';

$usuario = new Usuarios();
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

    <script type="text/javascript" src="clasesApp.js"></script>

    <title>Registro de Clases</title>

    <link rel="stylesheet" href="../../css/style.css">

</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-md-2 pr-0 pb-3">

            <div id="respuesta">
                <input type="hidden" id="limit" value="<?= $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 4; ?>"></input>
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

            <div class="card mx-3 mb-4 rounded-0 " style="width: 25rem;">
                <div class="card-header">
                    <h5><i class="fas fa-plus"></i> Registrar clase</h5>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="grupo">Grupo</label>
                        <input type="text" name="grupo" id="grupo" placeholder="Ingresar grupo" class="form-control">
                    </div>

                    <div class="form-row mb-4">
                        <div class="col-6">
                            <label for="fechaIni">Fecha de inicio</label>
                            <input type="date" name="fechaIni" id="fechaIni" value="<?php echo  $date ?>" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="fechaFin">Fecha final</label>
                            <input type="date" name="fechaFin" id="fechaFin" value="<?php echo  $date ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="cant-clases">N° de clases</label>
                            <input type="number" name="cantClases" id="cantClases" placeholder="Ingresar cant-clases" class="form-control">
                        </div>
                        <div class="col">
                            <label for="selectEstado">Estado</label>
                            <select name="selectEstado" id="selectEstado" class="form-control">
                                <option value="1" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col">
                            <button id="btn-ingresar-clase" type="button" class="btn btn-outline-success btn-block rounded-0">Registrar usuario</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card rounded-0 border-0 mx-4" style="width: 26rem;">
                <table class='table table-hover table-sm border-0 table-light' style="cursor: pointer;">
                    <!--tr class="table-active">
                        <th>Grupo</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>N° de clases</th>
                        <th>Estado</th>
                        <th>opciones</th>
                    </tr-->
                    <h5><i class="fas fa-list"></i> Clases</h5>
                    <hr class="p-0 m-0">


                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Clases = $clases->listarClasesPagination($paginationStart, $limit);

                        if ($Clases != null) {
                            foreach ($Clases as $Clases) {
                        ?>


                                <td colspan="6">
                                    <div class="d-flex justify-content-between mb-2" style="font-size: 15px;">
                                        <div class="text-muted"> <b>inicio:</b> <?php echo $Clases['fechainicio'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <b>finalización:</b> <?php echo $Clases['fechafin'] ?>

                                        </div>
                                        <div>
                                            <button type='button' class='btn btn-sm btn-outline-primary border-0' value='<?php echo $Clases['id_clase'] ?>' id='btn-editar-clase'><i class='fas fa-edit' style='pointer-events: none;'></i></button>
                                        </div>
                                    </div>

                                    <b class="text-muted">Grupo:</b><span class="text-primary"> <?php echo strtoupper($Clases['grupo']) ?></span><br>
                                    <span class="text-muted"><b>Número de clases: </b><?php echo $Clases['numeroclases'] ?><br></span>
                                    <?php
                                    if ($Clases['estado']  != 1) { ?>
                                        <span class="text-white bg-danger px-2 rounded-pill " style="font-size: 14px;">Inactivo</span>
                                    <?php } else { ?>
                                        <span class="text-white bg-success px-2 rounded-pill " style="font-size: 14px;">Activo</span>
                                    <?php } ?>


                                    <hr class="p-0 m-0  mt-2">

                                </td>




                                <!--td><?php echo $Clases['grupo'] ?></td>
                                <td><?php echo $Clases['fechainicio'] ?></td>
                                <td><?php echo $Clases['fechafin'] ?></td>
                                <td class="text-center"><?php echo $Clases['numeroclases'] ?></td>
                                <td>
                                    <?php
                                    if ($Clases['estado']  != 1) { ?>
                                        <div class='text-danger'>Inactivo</div>
                                    <?php } else { ?>
                                        <div class='text-success'>Activo</div>
                                    <?php } ?>
                                </td-->
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