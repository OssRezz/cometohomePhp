<?php
require '../Modelo/ModeloSedes.php';

$sedes = new Sedes();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script type="text/javascript" src="sedeApp.js"></script>

    <title>Registro de Sedes</title>

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

            <div class="card mx-3 rounded-0" style="width: 23rem;">

                <div class="card-header">
                    <h5><i class="fas fa-plus"></i> Registrar sede</h5>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="sede">Sede</label>
                        <input type="text" name="sede" id="sede" placeholder="Ingresar sede" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" placeholder="Ingresar direccion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" id="telefono" placeholder="Ingresar telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="aula">Aula</label>
                        <input type="text" name="aula" id="aula" placeholder="Ingresar aula" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="button" id="btn-ingresar-sede" class="btn btn-outline-success btn-block rounded-0">Registrar sede</button>
                    </div>
                </div>

            </div>

        </div>


        <div class="row d-flex justify-content-center ">

            <div class="card rounded-0 border-0">
                <table class='table table-hover table-sm table-responsive border'>
                    <tr>
                        <th>Id</th>
                        <th>Nombre de sede</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Aula</th>
                        <th>opciones</th>
                    </tr>
                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Sedes = $sedes->listarSedesPagination($paginationStart, $limit);

                        if ($Sedes != null) {
                            foreach ($Sedes as $Sedes) {
                        ?>
                                <td><?php echo $Sedes['id_sede'] ?></td>
                                <td><?php echo $Sedes['nombre'] ?></td>
                                <td><?php echo $Sedes['direccion'] ?></td>
                                <td><?php echo $Sedes['telefono'] ?></td>
                                <td><?php echo $Sedes['aula'] ?></td>

                                <td>
                                    <button type='button' class='btn btn-sm btn-outline-primary' value='<?php echo $Sedes['id_sede'] ?>' id='btn-editar-sede'><i class='fas fa-edit' style='pointer-events: none;'></i></button>
                                    <button class='btn btn-sm btn-outline-danger' value='<?php echo $Sedes['id_sede'] ?>"' id='btn-borrar-sede'><i class='fas fa-eraser' style='pointer-events: none;'></i></button>
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