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
