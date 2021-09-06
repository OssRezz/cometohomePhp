<?php
require '../Modelo/ModeloUsuarios.php';

$usuarios = new Usuarios();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="#">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script type="text/javascript" src="usuarioApp.js"></script>

    <title>Registro de Usuarios</title>
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
                <button class="btn btn-danger rounded-0"><i class="fas fa-times"></i> Cerrar Sesión</button>
            </div>
            <!--logo-->
            <div class="col d-flex align-items-center pb-4">
                <img src="../../images/logo.gif" height="110" alt="">
            </div>
        </div>


        <!--Links-->
        <script src="../../roles/App/script.js"></script>
        <div id="navbar"></div>

        <!---->
        <div class="row d-flex justify-content-center align-items-start py-3">

            <div class="card mx-3 rounded-0 mb-4" style="width: 23rem;">
                <div class="card-header">
                    <h5><i class="fas fa-plus"></i> Registrar usuario</h5>
                </div>



                <div class="card-body">

                    <div class="form-group">
                        <label for="identificacion">Identificación</label>
                        <input type="number" name="cedula" id="identificacion" placeholder="Ingresar cédula" class="form-control">
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
                        <label for="selectperfil">Perfil</label>
                        <select name="selectperfil" class="form-control" id="selectperfil">
                            <?php
                            $Perfiles = $usuarios->listarPerfiles();
                            if ($Perfiles != null) {
                                foreach ($Perfiles as $Perfiles) {
                            ?>
                                    <option value="<?php echo $Perfiles['id_perfil'] ?>"><?php echo $Perfiles['perfil'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="text" name="correo" id="correo" placeholder="Ingresar correo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Ingresar password" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="button" id="btn-ingresar-usuario" class="btn btn-outline-success btn-block rounded-0">Registrar usuario</button>
                    </div>
                </div>
            </div>

            <div class="card rounded-0 border-0">
                <table class='table table-hover table-sm table-responsive border'>
                    <tr>
                        <th>Codigo</th>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>opciones</th>
                    </tr>
                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Usuarios = $usuarios->listarUsuarios($paginationStart, $limit);

                        if ($Usuarios != null) {
                            foreach ($Usuarios as $Usuarios) {
                        ?>
                                <td><?php echo $Usuarios['codigo'] ?></td>
                                <td><?php echo $Usuarios['identificacion'] ?></td>
                                <td><?php echo $Usuarios['nombre'] ?></td>
                                <td><?php echo $Usuarios['email'] ?></td>
                                <td><?php echo $Usuarios['perfil'] ?></td>

                                <td>
                                    <button type='button' class='btn btn-sm btn-outline-primary' value='<?php echo $Usuarios['codigo'] ?>' id='btn-editar-usuario'><i class='fas fa-edit' style='pointer-events: none;'></i></button>
                                    <button class='btn btn-sm btn-outline-danger' value='<?php echo $Usuarios['codigo'] ?>"' id='btn-borrar'><i class='fas fa-eraser' style='pointer-events: none;'></i></button>
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