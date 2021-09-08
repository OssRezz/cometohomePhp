<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Configuración</title>

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
        <div class="row d-flex justify-content-center align-items-start pt-3">

            <div class="card mr-md-4 mb-4 rounded-0" style="width: 23rem;">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-at"></i> Cambiar correo electrónico </h5>

                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" id="email" placeholder="Correo actual" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nuevo-email">Correo nuevo</label>
                        <input type="email" id="nuevo-email" placeholder="Ingresar correo nuevo" class="form-control">
                    </div>

                    <div class="form-group mb-4">
                        <label for="repetir-email">Repetir correo nuevo</label>
                        <input type="email" id="repetir-email" placeholder="Repetir correo nuevo" class="form-control">
                    </div>

                    <button class="btn btn-outline-dark btn-block  rounded-0" id="btn-cambiar-email">Guardar</button>
                </div>
            </div>

            <div class="card mb-4  rounded-0" style="width: 23rem;">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-key"></i> Cambiar contraseña</h5>

                    <div class="form-group">
                        <label for="nuevo-password">Contraseña nueva</label>
                        <input type="password" id="nuevo-password" placeholder="Ingresar la contraseña nueva " class="form-control">
                    </div>

                    <div class="form-group mb-4">
                        <label for="repetir-password">Repetir contraseña nueva</label>
                        <input type="password" id="repetir-password" placeholder="Repetir la contraseña nueva" class="form-control">
                    </div>


                    <button class="btn btn-outline-dark btn-block  rounded-0" id="btn-cambiar-password">Guardar</button>
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
                    <button class="btn btn-outline-dark btn-block  rounded-0" id="btn-backup">Realizar Backup</button>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>