<?php
require '../Modelo/ModeloEstudiantes.php';
require '../../usuarios/Modelo/ModeloUsuarios.php';

$usuario = new Usuarios();
$estudiantes = new Estudiantes();

$usuario->sessionEstudiante();

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Clases De Alumnos</title>
    <script type="text/javascript" src="estudianteApp.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-md-2 pr-0 pb-3">

            <div id="respuesta">
                <input type="hidden" id="perfilUsuario" value="<?= $usuario->getPerfil() ?>"></input>
                <input type="hidden" id="idenEstudiante" value="<?= $usuario->getIdentificacion() ?>"></input>

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
        <div class="row d-flex justify-content-center py-3">

            <div class="card border-0  rounded-0 mb-5 mx-4">
                <div id="claseEstudiante"></div>
            </div>

        </div>


        <div class="row d-flex justify-content-center ">

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>