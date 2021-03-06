<?php

$perfil = $_POST['perfil'];

function adminMenu()
{
    echo  "                <a href='../../reportes/vista/indexAdmin.php' class='border-0 btn btn-w btn-outline-light rounded-0'>Inicio</a>";
    echo  "                <a href='../../usuarios/vista/usuarios.php' class='border-0 btn btn-w btn-outline-light rounded-0'>Usuarios</a>";
    echo  "                <a href='../../sedes/vista/sedes.php' class='border-0 btn btn-w btn-outline-light rounded-0'>Sedes</a>";
    echo  "                <div class='dropdown'>";
    echo  "                    <button class='btn btn-dark dropdown-toggle rounded-0' type='button' id='dropMenuProgramas' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
    echo  "                        Menú programas";
    echo  "                    </button>";
    echo  "                    <div class='dropdown-menu' aria-labelledby='dropMenuProgramas'>";
    echo  "                        <a class='dropdown-item' href='../../programas/vista/programas.php'>Programas</a>";
    echo  "                        <a class='dropdown-item' href='../../matriculas/vista/matriculas.php'>Matriculas</a>";
    echo  "                    </div>";
    echo  "                </div>";
    echo  "                 <a href='../../clases/vista/clases.php' class='border-0 btn btn-w btn-outline-light rounded-0'>Clases</a>";
    echo  "                <a href='../../eventos/vista/eventos.php' class='border-0 btn btn-w btn-outline-light rounded-0'>Eventos</a>";
    echo  "                <div class='dropdown'>";
    echo  "                    <button class='btn btn-dark dropdown-toggle rounded-0' type='button' id='dropMenuProfesores' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
    echo  "                        Menú profesores";
    echo  "                    </button>";
    echo  "                    <div class='dropdown-menu' aria-labelledby='dropMenuProfesores'>";
    echo  "                        <a class='dropdown-item' href='../../profesores/vista/profesores.php'>Profesores</a>";
    echo  "                        <a class='dropdown-item' href='../../asistenciaprofesor/vista/asistenciaprof.php'>Asist. profesores</a>";
    echo  "                    </div>";
    echo  "                </div>";
}

function profesorMenu()
{

    echo  "                <div class='dropdown'>";
    echo  "                    <button class='btn btn-dark dropdown-toggle rounded-0' type='button' id='dropMenuAlumnos' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
    echo  "                        Menú alumnos";
    echo  "                    </button>";
    echo  "                    <div class='dropdown-menu' aria-labelledby='dropMenuAlumnos'>";
    echo  "                        <a class='dropdown-item' href='../../estudiantes/vista/alumnos.php'>Alumnos</a>";
    echo  "                        <a class='dropdown-item' href='../../asistenciaestudiante/vista/asistenciaalumnos.php'>Asist. Alumnos</a>";
    echo  "                    </div>";
    echo  "                </div>";
}


function estudianteMenu($perfil)
{
    if ($perfil != 3) {
        echo  "                <a href='../../config/vista/config.php' class='border-0 btn btn-w btn-outline-light rounded-0' style='width: 50px;'><i class='fas fa-cog'></i></a>";
    } else {
        echo  "                <a href='../../estudiantes/vista/alumnoClase.php' class='border-0 btn btn-w btn-outline-light rounded-0'>Estudiante</a>";
        echo  "                <a href='../../config/vista/config.php' class='border-0 btn btn-w btn-outline-light rounded-0' style='width: 50px;'><i class='fas fa-cog'></i></a>";
    }
}


switch ($perfil) {
    case 1:
        adminMenu();
    case 2:
        profesorMenu();
    case 3:
        estudianteMenu($perfil);
        break;
}
