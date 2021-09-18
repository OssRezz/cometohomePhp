<?php

require_once '../../conexion.php';

class Estudiantes extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarEstudiantesPagination($paginationStart, $limit)
    {
        $listarEstudiantesPagination = null;
        $statement = $this->db->prepare("SELECT TE.*,TG.genero, TP.poblacion FROM `tbl_estudiantes` as TE
        INNER JOIN tbl_generos AS TG ON TG.id_genero=TE.id_genero
        INNER JOIN tbl_poblaciones AS TP ON TP.id_poblacion=TE.id_poblacion
        ORDER BY TE.nombre ASC LIMIT $paginationStart, $limit");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarEstudiantesPagination[] = $consulta;
        }
        return $listarEstudiantesPagination;
    }

    public function mostrarEstudiantesById($cc_estudiante)
    {
        $mostrarEstudiantesById = null;
        $statement = $this->db->prepare("SELECT TE.*,TG.genero, TP.poblacion FROM `tbl_estudiantes` as TE
        INNER JOIN tbl_generos AS TG ON TG.id_genero=TE.id_genero
        INNER JOIN tbl_poblaciones AS TP ON TP.id_poblacion=TE.id_poblacion
        WHERE TE.cc_estudiante=:cc_estudiante");
        $statement->bindParam(':cc_estudiante', $cc_estudiante);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $mostrarEstudiantesById[] = $consulta;
        }
        return $mostrarEstudiantesById;
    }

    /**
     * 
     * buscarEstudiantes
     *
     *Esta funcion recibe una variable.
     *Puede ser un string o numero.
     *devuelve un arreglo.
     * 
     * @param  mixed $cc_estudiante
     * @return array
     */
    public function buscarEstudiantes($cc_estudiante)
    {
        $buscarEstudiantes = null;
        $statement = $this->db->prepare("SELECT TE.*,TG.genero, TP.poblacion FROM `tbl_estudiantes` as TE
        INNER JOIN tbl_generos AS TG ON TG.id_genero=TE.id_genero
        INNER JOIN tbl_poblaciones AS TP ON TP.id_poblacion=TE.id_poblacion
       	WHERE TE.cc_estudiante LIKE '%' :cc_estudiante '%' OR TE.nombre LIKE '%' :cc_estudiante '%'
		ORDER BY TE.nombre ASC LIMIT 3;");
        $statement->bindParam(':cc_estudiante', $cc_estudiante);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $buscarEstudiantes[] = $consulta;
        }
        return $buscarEstudiantes;
    }

    public function tarjetaEstudiantes($cc_estudiante)
    {
        $tarjetaEstudiantes = null;
        $statement = $this->db->prepare("SELECT P.nombre AS 'profesor',P.email AS 'correo',E.nombre AS 'estudiante',TC.grupo,TC.estado,TE.escuela as 'escuela',TP.nombre as 'programa',TS.nombre AS 'sede' FROM `tbl_matriculas` AS M
        INNER JOIN tbl_profesores AS P ON P.cc_profesor=M.cc_profesor
        INNER JOIN tbl_clases AS TC ON TC.id_clase=M.id_clase
        INNER JOIN tbl_inscripciones AS TI ON TI.id_inscripcion=M.id_inscripcion
        INNER JOIN tbl_estudiantes AS E ON E.cc_estudiante=TI.cc_estudiante
        INNER JOIN tbl_programas AS TP ON TP.id_programa=TI.id_programa
        INNER JOIN tbl_escuelas AS TE ON TE.id_escuela=TP.id_escuela
        INNER JOIN tbl_sedes AS TS ON TS.id_sede=TP.id_sede              
        WHERE TI.cc_estudiante = :cc_estudiante");
        $statement->bindParam(':cc_estudiante', $cc_estudiante);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $tarjetaEstudiantes[] = $consulta;
        }
        return $tarjetaEstudiantes;
    }

    public function contadorEstudiantes()
    {
        $contadorEstudiantes = null;
        $statement = $this->db->prepare("SELECT Count(cc_estudiante) as 'id' FROM `tbl_estudiantes`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorEstudiantes[] = $consulta;
        }
        return $contadorEstudiantes;
    }

    public function listarGeneros()
    {
        $listarGeneros = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_generos`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarGeneros[] = $consulta;
        }
        return $listarGeneros;
    }

    public function listarPoblaciones()
    {
        $listarPoblaciones = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_poblaciones`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarPoblaciones[] = $consulta;
        }
        return $listarPoblaciones;
    }

    public function insertarEstudiante($cc_estudiante, $nombre, $id_genero, $id_poblacion, $direccion, $email, $telefono, $fechanaci, $sisben)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_estudiantes`(`cc_estudiante`, `nombre`, `id_genero`, `id_poblacion`, `direccion`, `email`, `telefono`, `fechanaci`, `sisben`)
         VALUES (:cc_estudiante,:nombre,:id_genero,:id_poblacion,:direccion,:email,:telefono,:fechanaci,:sisben)");
        $statement->bindParam(':cc_estudiante', $cc_estudiante);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':id_genero', $id_genero);
        $statement->bindParam(':id_poblacion', $id_poblacion);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':id_poblacion', $id_poblacion);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':fechanaci', $fechanaci);
        $statement->bindParam(':sisben', $sisben);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarEstudiante($cc_estudiante, $identificacion, $nombre, $id_genero, $id_poblacion, $direccion, $email, $telefono, $fechanaci, $sisben)
    {
        $statement = $this->db->prepare("UPDATE `tbl_estudiantes` SET `cc_estudiante`=:identificacion,`nombre`=:nombre,`id_genero`=:id_genero,
        `id_poblacion`=:id_poblacion,`direccion`=:direccion,`email`=:email,`telefono`=:telefono,`fechanaci`=:fechanaci,`sisben`=:sisben WHERE cc_estudiante=:cc_estudiante");
        $statement->bindParam(':cc_estudiante', $cc_estudiante);
        $statement->bindParam(':identificacion', $identificacion);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':id_genero', $id_genero);
        $statement->bindParam(':id_poblacion', $id_poblacion);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':id_poblacion', $id_poblacion);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':fechanaci', $fechanaci);
        $statement->bindParam(':sisben', $sisben);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
