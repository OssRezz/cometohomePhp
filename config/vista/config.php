<?php
require '../../usuarios/Modelo/ModeloUsuarios.php';

$usuario = new Usuarios();

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Configuración</title>
    <script src="configApp.js"></script>
    <link rel="stylesheet" href="../../css/style.css">

</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-md-2 pr-0 pb-3">

            <div id="respuesta">
                <input type="hidden" id="limit" value="<?= $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 3; ?>"></input>
                <input type="hidden" id="pagina" value="<?= $pagina = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1; ?>"></input>
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
        <div id="navbar"></div>

        <!---->
        <div class="row d-flex justify-content-center align-items-start pt-3">

            <div class="card mr-md-4 mb-4 rounded-0" style="width: 23rem;">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-at"></i> Cambiar correo electrónico </h5>

                    <div class="form-group">
                        <label for="nuevo-email">Correo nuevo</label>
                        <input type="number" id="id" value="<?php echo $usuario->getId() ?>" class="form-control" hidden>
                        <input type="email" id="nuevoEmail" placeholder="Ingresar correo nuevo" class="form-control">
                    </div>

                    <div class="form-group mb-4">
                        <label for="repetir-email">Repetir correo nuevo</label>
                        <input type="email" id="repetirEmail" placeholder="Repetir correo nuevo" class="form-control">
                    </div>

                    <button type="button" class="btn btn-outline-dark btn-block  rounded-0" id="btn-cambiar-correo">Guardar</button>
                </div>
            </div>

            <div class="card mb-4  rounded-0" style="width: 23rem;">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-key"></i> Cambiar contraseña</h5>

                    <div class="form-group">
                        <input type="text" id="nombre" value="<?php echo $usuario->getUsuario() ?>" class="form-control" hidden>
                        <input type="text" id="correo" value="<?php echo $usuario->getCorreo() ?>" class="form-control" hidden>
                        <input type="number" id="codigo" value="<?php echo $usuario->getId() ?>" class="form-control" hidden>
                        <label for="nuevo-password">Contraseña nueva</label>
                        <input type="password" id="nuevoPassword" placeholder="Ingresar la contraseña nueva " class="form-control">
                    </div>

                    <div class="form-group mb-4">
                        <label for="repetir-password">Repetir contraseña nueva</label>
                        <input type="password" id="repetirPassword" placeholder="Repetir la contraseña nueva" class="form-control">
                    </div>

                    <button type="button" class="btn btn-outline-dark btn-block  rounded-0" id="btn-cambiar-password">Guardar</button>

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
                </div>
            </div>



        </div>

        <div class="row d-flex justify-content-center ">

            <div class="card mr-md-4 mb-4 rounded-0" style="width: 23rem;">
                <div class="card-body ">
                    <h5 class="mb-3"><i class="fas fa-database"></i> Backup </h5>

                    <div class="card-text mb-4">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque adipisci ut hic delectus exercitationem nobis asperiores corporis necessitatibus, perspiciatis vel fuga, iusto ullam earum officia ex officiis, repellat natus et?
                    </div>
                    <a href="../control/ctrlBackUp.php" class="btn btn-outline-dark btn-block  rounded-0" id="btn-backup" target="_blank">Realizar Backup</a>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>