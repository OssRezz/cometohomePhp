<?php
require_once '../Modelo/ModeloProfesores.php';
require '../../usuarios/Modelo/ModeloUsuarios.php';

$usuario = new Usuarios();
$profesores = new Profesores();
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

    <script type="text/javascript" src="profesoresApp.js"></script>

    <title>Profesores</title>

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
        <div id="navbar"></div>

        <!---->
        <div class="row d-flex justify-content-center py-3">

            <div class="card mx-3 rounded-0 mb-4" style="width: 23rem;">
                <div class="card-header">
                    <h5><i class="fas fa-plus"></i> Registrar profesor</h5>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input type="text" name="cedula" id="cedula" placeholder="Ingresar cedula" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Ingresar nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Ingresar apellido" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" id="telefono" placeholder="Ingresar telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="email" id="email" placeholder="Ingresar correo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" placeholder="Ingresar titulo" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="button" id="btn-ingresar-profesor" class="btn btn-outline-success btn-block rounded-0">Registrar profesor</button>
                    </div>
                </div>

            </div>

            <div class="card rounded-0 border-0 mx-4" style="width: 26rem;">
                <table class='table table-hover table-sm border-0 table-light' style="cursor: pointer;">
                    <!--tr class="table-active">
                        <th>Cédula </th>
                        <th>Nombre</th>
                        <th>Titulo</th>
                        <th>Correo</th>
                        <th>Teléfono </th>
                        <th>opciones</th>
                    </tr-->
                    <h5><i class="fas fa-list"></i> Profesores</h5>
                    <hr class="p-0 m-0">

                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Profesores = $profesores->listarProfesoresPagination($paginationStart, $limit);

                        if ($Profesores != null) {
                            foreach ($Profesores as $Profesores) {
                        ?>

                                <td colspan="6">

                                    <div class="d-flex justify-content-between mb-2">
                                        <div><b class="text-muted">Id:</b> <?php echo $Profesores['cc_profesor'] ?></div>
                                        <div>
                                            <button type='button' class='btn btn-sm btn-outline-primary border-0' value='<?php echo $Profesores['cc_profesor'] ?>' id='btn-editar-profesor'><i class='fas fa-edit' style='pointer-events: none;'></i></button>
                                        </div>
                                    </div>

                                    <b class="text-muted"> Nombre:</b><span class="text-primary"> <?php echo strtoupper($Profesores['nombre']) ?></span><br>
                                    <span class="text-muted"><b>Titulo: </b><?php echo $Profesores['titulo'] ?><br></span>
                                    <span class="text-muted"><b>Correo: </b><?php echo $Profesores['email'] ?><br></span>
                                    <span class="text-muted"><b>Teléfono: </b><?php echo $Profesores['telefono'] ?><br></span>

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