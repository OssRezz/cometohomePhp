<?php
require '../Modelo/ModeloProgramas.php';
require '../../sedes/Modelo/ModeloSedes.php';
require '../../usuarios/Modelo/ModeloUsuarios.php';
$usuario = new Usuarios();
$programas = new Programas();
$sedes =  new Sedes();
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

    <script type="text/javascript" src="programasApp.js"></script>
    <link rel="stylesheet" href="../../css/style.css">

    <title>Registro de Programas</title>
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

            <div class="card mx-3 rounded-0 mb-4" style="width: 23rem;">
                <div class="card-header">
                    <h5><i class="fas fa-plus"></i> Registrar programas</h5>
                </div>

                <div class="card-body">

                    <form class="form" action="" method="POST">

                        <div class="form-row">
                            <div class="col">
                                <label for="selectescuela">Escuela</label>
                                <select name="selectescuela" class="form-control" id="selectescuela">
                                    <?php
                                    $Escuelas = $programas->listarEscuela();
                                    if ($Escuelas != null) {
                                        foreach ($Escuelas as $Escuelas) {
                                    ?>
                                            <option value="<?php echo $Escuelas['id_escuela'] ?>"><?php echo $Escuelas['escuela'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row my-3">
                            <div class="col">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Ingresar nombre" class="form-control">
                            </div>

                        </div>

                        <div class="form-row my-3">
                            <div class="col">
                                <label for="selectSede">Sede</label>
                                <select name="selectSede" class="form-control" id="selectsede">
                                    <?php
                                    $Sedes = $sedes->listarSedes();
                                    if ($Sedes != null) {
                                        foreach ($Sedes as $Sedes) {
                                    ?>
                                            <option value="<?php echo $Sedes['id_sede'] ?>"><?php echo $Sedes['nombre'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <label for="cupos">Cupos</label>
                                <input type="number" name="cupos" id="cupos" placeholder="Ingresar cupos" class="form-control">
                            </div>
                            <div class="col">
                                <label for="costo">Costo</label>
                                <input type="number" name="costo" id="costo" placeholder="Ingresar costo" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <label for="edad">Limite de edad</label>
                                <input type="text" name="edad" id="edad" placeholder="Ingresar edad" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-6">
                                <label for="f-inicio">Fecha de inicio</label>
                                <input type="date" name="f-inicio" id="fechainicio" value="<?php echo $date ?>" class="form-control" style="font-size: 14px">
                            </div>
                            <div class="col-6">
                                <label for="f-final">Fecha final</label>
                                <input type="date" name="f-final" id="fechafinal" value="<?php echo $date ?>" class="form-control" style="font-size: 14px">
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="col-8">
                                <label for="horario">Horario</label>
                                <input type="text" name="horario" id="horario" placeholder="Ingresar horario" class="form-control">
                            </div>
                            <div class="col">
                                <label for="select-estado">estado</label>
                                <select name="select-estado" id="selectestado" class="form-control">
                                    <option value="1" selected>Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <button type="button" id="btn-ingresar-programa" class="btn btn-outline-success btn-block rounded-0">Registrar programa</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <div class="card border-0 rounded-0 p-0 m-0 mx-4" style="width: 26rem;">
                <table class="table border table-hover">
                    <!--Trabajador-->

                    <h5><i class="fas fa-list"></i> Programas</h5>
                    <hr class="p-0 m-0">

                    <tr class="">
                        <div id="accordion">
                            <?php
                            $paginationStart = ($pagina - 1) * $limit;
                            $Programas = $programas->listarProgramas($paginationStart, $limit);
                            // $Usuarios = $usuario->listaUsuarios();
                            if ($Programas != null) {
                                foreach ($Programas as $Programas) {
                            ?>
                                    <!--collapseExampleOne es el id -->
                                    <button class="btn btn-block  border bg-light rounded-0 d-flex justify-content-start py-1 shadow-none px-2 text-dark" data-toggle="collapse" data-target="#collapse<?php echo $Programas['id_programa'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $Programas['id_programa'] ?>">
                                        <span class="text-left"><?php echo $Programas['nombre'] ?></span>
                                    </button>
                                    <div class="collapse border border-top-0 " id="collapse<?php echo $Programas['id_programa'] ?>" data-parent="#accordion">
                                        <ul class="list-group list-group-flush text-muted">
                                            <li class="list-group-item lp d-flex justify-content-between">
                                                <div class=""><b>Escuela </b>: <?php echo $Programas['escuela'] ?></div>
                                                <div class="text-center">
                                                    <button class="btn btn-sm btn-outline-primary border-0" id="btn-editar-programa" value="<?php echo $Programas['id_programa'] ?>"><i class='fas fa-edit' style='pointer-events: none;'></i></button>
                                                </div>
                                            </li>
                                            <li class="list-group-item lp"><b>Edad requerida </b>: <?php echo $Programas['edad'] ?></li>
                                            <li class="list-group-item lp"><b>Lugar </b>: <?php echo $Programas['nombreSede'] ?></li>
                                            <li class="list-group-item lp"><b>Cupos </b>: <?php echo $Programas['cupos'] ?></li>
                                            <li class="list-group-item lp"><b>Costo </b>: <?php echo $Programas['costo'] ?></li>
                                            <li class="list-group-item lp"><b>Fecha de inicio </b>: <?php echo $Programas['fechainicio'] ?></li>
                                            <li class="list-group-item lp"><b>Fecha de finalización </b>: <?php echo $Programas['fechafin'] ?></li>
                                            <?php
                                            if ($Programas['estado'] != 1) { ?>
                                                <li class='list-group-item lp'><span class="text-white bg-danger px-2 rounded-pill " style="font-size: 14px;">Inactivo</span></li>
                                            <?php } else { ?>
                                                <li class='list-group-item lp text-success'><span class="text-white bg-success px-2 rounded-pill " style="font-size: 14px;">Activo</span></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </tr>

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