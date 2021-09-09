<?php
require '../../usuarios/Modelo/ModeloUsuarios.php';
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

        <div class="row bgcc t pt-0 pl-5 pr-0">

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

        <!--Artes audiovisuales-->
        <div class="row d-flex justify-content-center mt-5 py-3 " id="audiovisuales">
            <h5 class=" text-center py-2 px-5 rounded"><i class="fas fa-flag"></i> Reportes</h5>
        </div>
        <div class="row d-flex justify-content-center py-3">
            <div id="respuesta"></div>

            <div class="card mx-3 mb-3 card-image-width rounded-0">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Curso</h5>
                    <p>
                        <b>Escuela:</b> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, excepturi. <br>
                        <b>fecha:</b> 19/05/2029
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    Reporte #1
                </div>
            </div>
            <div class="card mx-3 mb-3 card-image-width rounded-0">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Curso</h5>
                    <p>
                        <b>Escuela:</b> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, excepturi. <br>
                        <b>fecha:</b> 19/05/2029
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    Reporte #2
                </div>
            </div>
            <div class="card mx-3 mb-3 card-image-width rounded-0">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Curso</h5>
                    <p>
                        <b>Escuela:</b> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, excepturi. <br>
                        <b>fecha:</b> 19/05/2029 <br>
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    Reporte #3
                </div>
            </div>




        </div>


        <div class="row d-flex justify-content-center">

            <div class="card card-image-width  rounded-0 ">
                <ul class="list-group  list-group-flush">

                    <li class="list-group-item d-flex justify-content-between">
                        Lista de clases activas
                        <a href="../control/ctrlListaClasesActivas.php" class="btn border-0 rounded-0 ">
                            <i class="fas fa-download text-success">
                            </i>
                        </a>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Reporte de matriculas
                        <a href="../control/ctrlReporteMatriculas.php" class="btn border-0 rounded-0 ">
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

            <div class="card card-image-width  rounded-0">
                <ul class="list-group  list-group-flush">

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

                </ul>
            </div>



        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>