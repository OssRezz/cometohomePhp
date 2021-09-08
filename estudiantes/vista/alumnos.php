<?php
require '../Modelo/ModeloEstudiantes.php';
$estudiantes = new Estudiantes();


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
        <div class="row d-flex justify-content-center py-3">

            <div class="card border-top-0  rounded-0">

                <table class='table table-hover table-sm table-responsive border'>
                    <tr>
                        <th>Cédula </th>
                        <th>Estudiante</th>
                        <th>Nacimiento</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Sisben</th>
                        <th>Genero</th>
                        <th>Poblacion</th>
                        <th>Opciones</th>
                    </tr>
                    <tr>
                        <?php
                        $paginationStart = ($pagina - 1) * $limit;
                        $Estudiantes = $estudiantes->listarEstudiantesPagination($paginationStart, $limit);

                        if ($Estudiantes != null) {
                            foreach ($Estudiantes as $Estudiantes) {
                        ?>
                                <td><?php echo $Estudiantes['cc_estudiante'] ?></td>
                                <td><?php echo $Estudiantes['nombre'] ?></td>
                                <td><?php echo $Estudiantes['fechanaci'] ?></td>
                                <td><?php echo $Estudiantes['email'] ?></td>
                                <td><?php echo $Estudiantes['telefono'] ?></td>
                                <td><?php echo $Estudiantes['direccion'] ?></td>
                                <td><?php echo $Estudiantes['sisben'] ?></td>
                                <td><?php echo $Estudiantes['genero'] ?></td>
                                <td><?php echo $Estudiantes['poblacion'] ?></td>

                                <td>
                                    <button type='button' class='btn btn-sm btn-outline-primary' value='<?php echo $Estudiantes['cc_estudiante'] ?>' id='btn-editar-estudiante'><i class='fas fa-edit' style='pointer-events: none;'></i></button>
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