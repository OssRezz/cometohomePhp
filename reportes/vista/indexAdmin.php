<?php
require '../../usuarios/Modelo/ModeloUsuarios.php';
require '../../estudiantes/Modelo/ModeloEstudiantes.php';
require '../../matriculas/Modelo/ModeloMatriculas.php';
require '../../programas/Modelo/ModeloProgramas.php';


$programas = new Programas();
$matricula = new Matriculas();
$estudiante = new Estudiantes();
$usuario = new Usuarios();
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
    <title>Inicio Administración</title>
    <script type="text/javascript" src="indexAdminApp.js"></script>
    <link rel="stylesheet" href="../../css/style.css">

</head>

<body>


    <div class="container-fluid">


        <div class="row bgcc t pt-0 pl-md-2 pr-0 pb-3">
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

        <!--Artes audiovisuales-->
        <div class="row d-flex justify-content-center mt-5 py-3 " id="audiovisuales">
            <h5 class=" text-center py-2 px-5 rounded"><i class="fas fa-flag"></i> Reportes</h5>
        </div>

        <div class="row d-flex justify-content-center py-3">
            <div id="respuesta">
                <input type="hidden" id="perfilUsuario" value="<?= $usuario->getPerfil() ?>"></input>
            </div>

            <div class="card mx-3 mb-3 card-image-width rounded-0">
                <div class="card-body  align-items-center d-flex justify-content-center">
                    <div class="display-4 ">
                        <?php
                        $totalProgramas = $programas->contadorProgramasActivos();
                        if ($totalProgramas != null) {
                            echo $totalProgramas[0]['id'];
                        } else {
                            echo "0";
                        }
                        ?>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    Programas activos
                </div>
            </div>

            <div class="card mx-3 mb-3 card-image-width rounded-0">
                <div class="card-body  align-items-center d-flex justify-content-center">
                    <div class="display-4 ">
                        <?php
                        $totalEstudiantes = $estudiante->contadorEstudiantes();
                        if ($totalEstudiantes != null) {
                            echo $totalEstudiantes[0]['id'];
                        } else {
                            echo "0";
                        }
                        ?>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    Estudiantes registrados
                </div>
            </div>

            <div class="card mx-3 mb-3 card-image-width rounded-0">
                <div class="card-body  align-items-center d-flex justify-content-center">
                    <div class="display-4 ">
                        <?php
                        $totalMatricula = $matricula->contadorMatricula();
                        if ($totalMatricula != null) {
                            echo $totalMatricula[0]['id'];
                        } else {
                            echo "0";
                        }
                        ?>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    Estudiantes matriculados
                </div>
            </div>

        </div>


        <div class="row d-flex justify-content-center">

            <div class="card card-image-width  rounded-0 ">
                <ul class="list-group  list-group-flush">



                    <li class="list-group-item d-flex justify-content-between">
                        Reporte de matriculas
                        <a href="../control/ctrlReporteMatriculas.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        № de Inscripciones
                        <a href="../control/ctrlInscripcionesPrograma.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Reporte de poblaciones
                        <a href="../control/ctrlReportePoblaciones.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Reporte de generos
                        <a href="../control/ctrlReporteGeneros.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Reporte de eventos
                        <a href="../control/ctrlReporteEvento.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>



                </ul>
            </div>

            <div class="card card-image-width  rounded-0">
                <ul class="list-group  list-group-flush">

                    <li class="list-group-item d-flex justify-content-between">
                        Lista de clases activas
                        <a href="../control/ctrlListaClasesActivas.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Asistencia de alumnos
                        <a href="../control/ctrlListaAsistenciaAlumno.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Asistencia de profesores
                        <a href="../control/ctrlListaAsistenciaProfesor.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Lista de estudiantes
                        <a href="../control/ctrlListaDeAlumnos.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Lista de profesores
                        <a href="../control/ctrlListaDeProfesores.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>





                </ul>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>