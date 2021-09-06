<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

        <script type="text/javascript" src="js/profesoresApp.js"></script>   

        <title>Profesores</title>

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
            <div class="row d-flex justify-content-center py-3">  

                <div class="card mx-3 rounded-0 mb-4"  style="width: 23rem;">
                    <div class="card-header">    
                        <h5><i class="fas fa-plus"></i> Registrar profesor</h5>
                    </div>

                    <div class="card-body">  

                        <div class="form-group"> 
                            <label for="cedula">Cédula</label>  
                            <input type="text" name="cedula" id="cedula" placeholder="Ingresar cedula" class="form-control">
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
                            <label for="telefono">Telefono</label>  
                            <input type="text" name="telefono" id="telefono" placeholder="Ingresar telefono" class="form-control">
                        </div>  
                        <div class="form-group">  
                            <label for="email">Correo</label>  
                            <input type="email" name="email" id="email" placeholder="Ingresar correo" class="form-control">
                        </div>
                        <div class="form-group">  
                            <label for="titulo">Titulo</label>  
                            <input type="text" name="titulo" id="titulo" placeholder="Ingresar titulo" class="form-control">
                        </div>
                        <div class="form-group">   
                            <button type="button" id="btn-ingresar-profesor" class="btn btn-outline-success btn-block rounded-0" >Registrar profesor</button>
                        </div>           
                        <div id="respuesta"></div>

                    </div>                                               
                </div>

                <div class="card rounded-0 border-0">  
                    <div id="tablaDeProfesores"></div>
                </div>  


            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
