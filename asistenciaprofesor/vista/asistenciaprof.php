<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <title>Asistencia de Profesores</title>
        <script type="text/javascript" src="js/asisprofeApp.js"></script>

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

                <div class="card mx-3 rounded-0">
                    <div class="card-header">    
                        <h5><i class="fas fa-check"></i> Tomar asistencia de profesor</h5>
                    </div>



                    <div class="card-body">  

                        <form class="form" action="" method="POST">

                            <div class="form-row">
                                <div class="col">  
                                    <label for="cedula">Cédula</label>  
                                    <input type="text" name="cedula" id="cedula" placeholder="Ingresar cedula" class="form-control">
                                </div>  
                            </div>

                            <div class="form-row my-3">  
                                <div class="col">
                                    <label for="selectClase">Clase</label>
                                    <div id="selectClase"></div>
                                </div>
                            </div>
                            <div class="form-row mb-4">  
                                <div class="col">  
                                    <label for="fechaClase">Fecha de la clase</label>  
                                    <input type="date" name="fechaClase" id="fechaClase" placeholder="Ingresar f-clase" class="form-control">
                                </div>  
                                <div class="col">
                                    <label for="selectAsistencia">¿Asistió?</label>
                                    <select name="selectAsistencia" id="selectAsistencia" class="form-control">
                                        <option value="1" selected>Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>                             

                            <div class="form-row">  
                                <div class="col">   
                                    <button type="button" id="btn-ingresar-asisprofe" class="btn btn-outline-success btn-block rounded-0">Registrar asistencia</button>
                                </div>

                            </div>  
                            <div id="respuesta"></div>
                        </form>                        

                    </div>                                               
                </div>

                <div class="card rounded-0 border-0">                       
                    <div id="tablaDeAsisProfe"></div> 
                </div>  




            </div>


            <div class="row d-flex justify-content-center ">

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
