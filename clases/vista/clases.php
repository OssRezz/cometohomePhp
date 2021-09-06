<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script type="text/javascript" src="clasesApp.js"></script>

    <title>Registro de Clases</title>

    <link rel="stylesheet" href="../../css/style.css">

</head>

<body>


    <div class="container-fluid">

        <div class="row bgcc t pt-0 pl-5 pr-0">

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

            <div class="card mx-3 mb-4 rounded-0" style="width: 25rem;">
                <div class="card-header">
                    <h5><i class="fas fa-plus"></i> Registrar clase</h5>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="selectPrograma">Programas</label>
                        <div id="selectPrograma"></div>
                    </div>

                    <div class="form-group">
                        <label for="grupo">Grupo</label>
                        <input type="text" name="grupo" id="grupo" placeholder="Ingresar grupo" class="form-control">
                    </div>

                    <div class="form-row mb-4">
                        <div class="col-6">
                            <label for="f-inicio">Fecha de inicio</label>
                            <input type="date" name="fechaIni" id="fechaIni" placeholder="Ingresar f-inicio" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="f-final">Fecha final</label>
                            <input type="date" name="fechaFin" id="fechaFin" placeholder="Ingresar f-final" class="form-control">
                        </div>
                    </div>

                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="cant-clases">N° de clases</label>
                            <input type="number" name="cantClases" id="cantClases" placeholder="Ingresar cant-clases" class="form-control">
                        </div>
                        <div class="col">
                            <label for="selectEstado">estado</label>
                            <select name="selectEstado" id="selectEstado" class="form-control">
                                <option value="1" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col">
                            <button id="btn-ingresar-clase" type="button" class="btn btn-outline-success btn-block rounded-0">Registrar usuario</button>
                        </div>
                    </div>
                    <div id="respuesta"></div>
                </div>
            </div>

            <div class="card rounded-0 border-0">
                <div id="tablaDeClases"></div>
            </div>

        </div>

        <div class="row d-flex justify-content-center ">
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>