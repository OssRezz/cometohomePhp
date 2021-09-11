<?php
// require '../Modelo/ModeloEstudiantes.php';
// $estudiantes = new Estudiantes();
$date = date('Y-m-d');


?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="loginApp.js"></script>
    <title>Registro de Alumnos</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body class=" bgcc ">


    <div class="container-fluid" >

        <div class="row bgcc t pt-0 pl-md-2 pr-0 pb-3" style="margin-top: 38px;">
            <!--logo-->
            <div class="col d-flex align-items-center pb-4">
                <img src="../../images/logo.gif" height="110" alt="">
            </div>
        </div>

        <!-- 
        Links
        <script src="js/navbarApp.js"></script>
        <div id="navbar"></div> -->

        <!---->
        <div class="row d-flex justify-content-center py-3">

            <div class="card mx-3 rounded-0 mb-4" style="width: 21rem;">
                <div class="card-header text-center bg-white border-0 mb-2">
                    <h5><i class="fas fa-sign-in-alt"></i> Iniciar sesión</h5>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="identificacion">Identificación</label>
                        <input type="number" name="identificacion" id="identificacion" autocomplete="curren" placeholder="Ingresar numero de identificacion" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="current-password" placeholder="Ingrese su password" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="button" id="btn-inciar-sesion" class="btn btn-outline-success btn-block rounded-0">Ingresar</button>
                    </div>
                    <div id="respuesta"></div>
                </div>
            </div>

        </div>


        <div class="row d-flex justify-content-center ">

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>