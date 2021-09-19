<?php
require '../Modelo/ModeloEstudiantes.php';
$estudiantes = new Estudiantes();
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
    <script type="text/javascript" src="estudianteApp.js"></script>
    <title>Registro de Alumnos</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-5 pr-0">

            <div class="col-12 d-flex justify-content-end align-items-end px-0">
                <a class="btn btn-primary rounded-0" href="../../login/vista/login.php"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
            </div>

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

            <div class="card mx-3 rounded-0 mb-4" style="width: 60rem;">
                <div class="card-header">
                    <h5><i class="fas fa-plus"></i> Registrarse</h5>
                </div>

                <div class="card-body">

                    <div class="card-text mb-4">
                        Por favor ingrese los datos solicitados a continuación y luego de clic en el botón registrarse<br>

                    </div>
                    <div class="form-group">
                        <label for="identificacion">Identificación</label>
                        <input type="number" name="identificacion" id="identificacion" placeholder="Ingresar numero de identificacion" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" placeholder="Ingresar nombre" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" placeholder="Ingresar apellidos" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nacimiento">Nacimiento</label>
                            <input type="date" id="nacimiento" class="form-control" value="<?php echo $date ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sisben">Sisbén</label>
                            <select id="sisben" class="form-control">
                                <option value="A" selected>A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Correo electronico</label>
                            <input type="email" name="email" id="email" placeholder="Ingresar correo electronico" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefono">Teléfono</label>
                            <input type="number" name="telefono" id="telefono" placeholder="Ingresar telefono" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" placeholder="Ingresar dirección" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="selectGenero">Genero</label>
                        <select name="selectGenero" class="form-control" id="selectGenero">
                            <?php
                            $listaGenero = $estudiantes->listarGeneros();
                            if ($listaGenero != null) {
                                foreach ($listaGenero as $listaGenero) {
                            ?>
                                    <option value="<?php echo $listaGenero['id_genero'] ?>"><?php echo $listaGenero['genero'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-24">
                        <label for="selectPoblacion">Poblacion</label>
                        <select name="selectPoblacion" class="form-control" id="selectPoblacion">
                            <?php
                            $listaPoblaciones = $estudiantes->listarPoblaciones();
                            if ($listaPoblaciones != null) {
                                foreach ($listaPoblaciones as $listaPoblaciones) {
                            ?>
                                    <option value="<?php echo $listaPoblaciones['id_poblacion'] ?>"><?php echo $listaPoblaciones['poblacion'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="Ingresar su contraseña" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="passwordVerify">Repita la Contraseña</label>
                            <input type="password" name="passwordVerify" id="passwordVerify" placeholder="Ingresar su contraseña" class="form-control">
                        </div>
                    </div>
                    <div class="card-text text-primary mb-4">
                        *Las contraseñas deben coincidir.<br>

                    </div>
                    <div class="form-group">
                        <button type="button" id="btn-ingresar-estudiante" class="btn btn-outline-success btn-block rounded-0">Registrarse</button>
                    </div>
                    <div id="spinner">
                        <div class="sk-chase">
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                        </div>
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