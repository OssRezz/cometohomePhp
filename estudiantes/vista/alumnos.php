<?php
require '../Modelo/ModeloEstudiantes.php';
require '../../usuarios/Modelo/ModeloUsuarios.php';

$usuario = new Usuarios();
$estudiantes = new Estudiantes();

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
    <title>Registro de Alumnos</title>
    <script type="text/javascript" src="estudianteApp.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-5 pr-0">
            <div id="respuesta">
                <input type="hidden" id="limit" value="<?= $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 3; ?>"></input>
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

            <div class="card border-0  rounded-0 mb-5 mx-4" style="width: 26rem;">

                <div class="card-body px-0">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id='inputSearch' placeholder="Ingrese id o nombre del alumno" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="btn-buscar-estudiante"><i class="fas fa-search" style='pointer-events: none;'></i> Buscar</button>
                        </div>
                    </div>

                </div>

                <table class='table table-hover table-sm border-0 table-light' style="cursor: pointer;">

                    <h5><i class="fas fa-list"></i> Alumnos</h5>
                    <hr class="p-0 m-0">

                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Estudiantes = $estudiantes->listarEstudiantesPagination($paginationStart, $limit);

                        if ($Estudiantes != null) {
                            foreach ($Estudiantes as $Estudiantes) {
                        ?>


                                <td>
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="text-muted"><b>Id:</b> <?php echo $Estudiantes['cc_estudiante'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="text-muted"><b>Teléfono: </b><?php echo $Estudiantes['telefono'] ?></span>

                                        </div>
                                        <div>
                                            <button type='button' class='btn btn-sm btn-outline-primary border-0' value='<?php echo $Estudiantes['cc_estudiante'] ?>' id='btn-editar-estudiante'><i class='fas fa-edit' style='pointer-events: none;'></i></button>
                                        </div>
                                    </div>

                                    <span class="text-primary"><?php echo strtoupper($Estudiantes['nombre']) ?></span><br>
                                    <span class="text-muted"><b>Fecha de inicio: </b><?php echo $Estudiantes['fechanaci'] ?><br></span>
                                    <span class="text-muted"><b>Correo: </b><?php echo $Estudiantes['email'] ?><br></span>
                                    <span class="text-muted"><b>Dirección: </b><?php echo $Estudiantes['direccion'] ?><br></span>
                                    <span class="text-muted"><b>Sisben: </b><?php echo $Estudiantes['sisben'] ?><span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span class="text-muted"><b>Genero: </b><?php echo $Estudiantes['genero'] ?></span>
                                            <br></span>
                                        <span class="text-muted"><b>Población: </b><?php echo $Estudiantes['poblacion'] ?><br></span>



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


        <div class="row d-flex justify-content-center ">

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>