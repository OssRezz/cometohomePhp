<?php
require '../Modelo/ModeloSedes.php';
require '../../usuarios/Modelo/ModeloUsuarios.php';
$usuario = new Usuarios();
$sedes = new Sedes();

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

    <script type="text/javascript" src="sedeApp.js"></script>

    <title>Registro de Sedes</title>

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

            <div class="card mx-3 rounded-0 mb-5" style="width: 23rem;">

                <div class="card-header">
                    <h5><i class="fas fa-plus"></i> Registrar sede</h5>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="sede">Sede</label>
                        <input type="text" name="sede" id="sede" placeholder="Ingresar sede" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" placeholder="Ingresar direccion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" id="telefono" placeholder="Ingresar telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="aula">Aula</label>
                        <input type="text" name="aula" id="aula" placeholder="Ingresar aula" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="button" id="btn-ingresar-sede" class="btn btn-outline-success btn-block rounded-0">Registrar sede</button>
                    </div>
                </div>

            </div>



            <div class="card rounded-0 border-0 mx-4" style="width: 26rem;">
                <table class='table table-hover table-sm border-0 table-light' style="cursor: pointer;">

                    <h5><i class="fas fa-list"></i> Lista de Sedes</h5>
                    <hr class="p-0 m-0">

                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Sedes = $sedes->listarSedesPagination($paginationStart, $limit);

                        if ($Sedes != null) {
                            foreach ($Sedes as $Sedes) {
                        ?>



                                <td colspan="6">

                                    <div class="d-flex justify-content-between mb-2">
                                        <div>ID<?php echo $Sedes['id_sede'] ?></div>
                                        <div>
                                            <button type='button' class='btn btn-sm btn-outline-primary border-0' value='<?php echo $Sedes['id_sede'] ?>' id='btn-editar-sede'><i class='fas fa-edit' style='pointer-events: none;'></i></button>
                                            <button class='btn btn-sm btn-outline-danger border-0' value='<?php echo $Sedes['id_sede'] ?>"' id='btn-borrar-sede'><i class='fas fa-eraser' style='pointer-events: none;'></i></button>
                                        </div>
                                    </div>

                                    <span class="text-primary"><?php echo strtoupper($Sedes['nombre']) ?></span><br>
                                    <span class="text-muted"><b>Dirección: </b><?php echo $Sedes['direccion'] ?><br></span>
                                    <span class="text-muted"><b>Teléfono: </b><?php echo $Sedes['telefono'] ?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Aula: </b><?php echo $Sedes['aula'] ?></span>

                                    <hr class="p-0 m-0  mt-2">
                                </td>


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