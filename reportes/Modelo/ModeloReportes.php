<?php

require_once '../../conexion.php';

class Reportes extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listaClasesActivas()
    {
        $listaClasesActivas = null;
        $statement = $this->db->prepare("SELECT TC.grupo as 'clase',P.nombre as 'profesor',E.nombre as 'estudiante',TM.*,E.cc_estudiante, TC.estado FROM `tbl_matriculas` as TM
        INNER JOIN tbl_inscripciones AS TI ON TI.id_inscripcion=TM.id_inscripcion 
        INNER JOIN tbl_estudiantes AS E ON E.cc_estudiante=TI.cc_estudiante 
        INNER JOIN tbl_profesores AS P ON P.cc_profesor=TM.cc_profesor
        INNER JOIN tbl_clases AS TC ON TC.id_clase=TM.id_clase 
        WHERE TC.estado = 1
        ORDER BY TM.id_clase");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaClasesActivas[] = $consulta;
        }
        return $listaClasesActivas;
    }

    public function reporteDeMatriculas()
    {
        $reporteDeMatriculas = null;
        $statement = $this->db->prepare("SELECT TC.grupo as 'clase',P.nombre as 'profesor',E.nombre as 'estudiante',TM.*,E.cc_estudiante FROM `tbl_matriculas` as TM
        INNER JOIN tbl_inscripciones AS TI ON TI.id_inscripcion=TM.id_inscripcion 
        INNER JOIN tbl_estudiantes AS E ON E.cc_estudiante=TI.cc_estudiante 
        INNER JOIN tbl_profesores AS P ON P.cc_profesor=TM.cc_profesor
        INNER JOIN tbl_clases AS TC ON TC.id_clase=TM.id_clase 
        ORDER BY TM.fechamatricula DESC");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $reporteDeMatriculas[] = $consulta;
        }
        return $reporteDeMatriculas;
    }

    public function listaAlumnos()
    {
        $listaAlumnos = null;
        $statement = $this->db->prepare("SELECT E.*, G.genero, P.poblacion FROM `tbl_estudiantes` AS E
        INNER JOIN tbl_generos AS G ON G.id_genero=E.id_genero
        INNER JOIN tbl_poblaciones AS P ON P.id_poblacion=E.id_poblacion ORDER BY nombre ASC");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaAlumnos[] = $consulta;
        }
        return $listaAlumnos;
    }

    public function listaProfesores()
    {
        $listaProfesores = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_profesores` ORDER BY nombre ASC");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaProfesores[] = $consulta;
        }
        return $listaProfesores;
    }

    public function listaAsistenciaAlumnos()
    {
        $listaAsistenciaAlumnos = null;
        $statement = $this->db->prepare("SELECT TC.grupo,TC.numeroclases,E.nombre,TAE.id_asisestudiante, TAE.cc_estudiante,
        TAE.id_clase,max(TAE.fecha) as 'fecha',SUM(TAE.asistencia) as 'asistencia' FROM tbl_asisestudiantes as TAE
        INNER JOIN tbl_clases AS TC ON TC.id_clase=TAE.id_clase
        INNER JOIN tbl_estudiantes AS E ON E.cc_estudiante=TAE.cc_estudiante WHERE TC.estado = 1
        GROUP BY TAE.id_clase,E.cc_estudiante desc ORDER BY TAE.id_clase");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaAsistenciaAlumnos[] = $consulta;
        }
        return $listaAsistenciaAlumnos;
    }

    public function listaAsistenciaProfesores()
    {
        $listaAsistenciaProfesores = null;
        $statement = $this->db->prepare("SELECT TC.grupo,TC.numeroclases,P.nombre,TAP.id_asisprofesor, TAP.cc_profesor,
        TAP.id_clase,max(TAP.fecha) as 'fecha',SUM(TAP.asistencia) as 'asistencia' FROM `tbl_asisprofesores` as TAP
        INNER JOIN tbl_clases AS TC ON TC.id_clase=TAP.id_clase
        INNER JOIN tbl_profesores AS P ON P.cc_profesor=TAP.cc_profesor WHERE TC.estado = 1
        GROUP BY TC.id_clase, P.cc_profesor desc ORDER BY TAP.id_clase");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaAsistenciaProfesores[] = $consulta;
        }
        return $listaAsistenciaProfesores;
    }


    public function incripcionesPorPrograma()
    {
        $incripcionesPorPrograma = null;
        $statement = $this->db->prepare("SELECT TP.nombre AS 'programa', COUNT(TI.id_programa) 'numInscripciones' FROM `tbl_inscripciones` AS TI
        INNER JOIN tbl_programas as TP on TP.id_programa=TI.id_programa
        GROUP BY TI.id_programa
        ORDER BY (numInscripciones) DESC");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $incripcionesPorPrograma[] = $consulta;
        }
        return $incripcionesPorPrograma;
    }

    public function reporteGenero()
    {
        $reporteGenero = null;
        $statement = $this->db->prepare("SELECT  E.id_genero,TG.genero, count(E.id_genero) as 'cantGenero' FROM `tbl_estudiantes` AS E
        INNER JOIN tbl_generos AS TG ON TG.id_genero=E.id_genero
        GROUP BY E.id_genero  
        ORDER BY cantGenero DESC");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $reporteGenero[] = $consulta;
        }
        return $reporteGenero;
    }

    public function reportePoblaciones()
    {
        $reportePoblaciones = null;
        $statement = $this->db->prepare("SELECT  E.id_poblacion,TP.poblacion, count(E.id_poblacion) as 'cantPoblacion' FROM `tbl_estudiantes` AS E
        INNER JOIN tbl_poblaciones AS TP ON TP.id_poblacion=E.id_poblacion
        GROUP BY E.id_poblacion 
        ORDER BY cantPoblacion DESC");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $reportePoblaciones[] = $consulta;
        }
        return $reportePoblaciones;
    }

    public function reporteEvento()
    {
        $reporteEvento = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_eventos` order BY fecha DESC");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $reporteEvento[] = $consulta;
        }
        return $reporteEvento;
    }
}
