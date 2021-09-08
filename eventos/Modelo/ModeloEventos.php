<?php

require_once '../../conexion.php';

class Eventos extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarEvento()
    {
        $listarEvento = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_eventos`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarEvento[] = $consulta;
        }
        return $listarEvento;
    }

    public function listarEventosPagination($paginationStart, $limit)
    {
        $listarEventosPagination = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_eventos`  ORDER BY nombre  desc LIMIT $paginationStart, $limit;");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarEventosPagination[] = $consulta;
        }
        return $listarEventosPagination;
    }

    public function contadorEventos()
    {
        $contadorEventos = null;
        $statement = $this->db->prepare("SELECT count(id_evento) as 'id' FROM tbl_eventos");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $contadorEventos[] = $consulta;
        }
        return $contadorEventos;
    }

    public function MostrarEventosById($id)
    {
        $MostrarEventosById = null;
        $statement = $this->db->prepare("SELECT * FROM `tbl_eventos` WHERE id_evento=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $MostrarEventosById[] = $consulta;
        }
        return $MostrarEventosById;
    }


    public function insertarEvento($nombre, $descripcion, $fecha, $horainicio, $horafin)
    {
        $statement = $this->db->prepare("INSERT INTO `tbl_eventos`(`nombre`, `descripcion`, `fecha`, `horainicio`, `horafin`) VALUES (:nombre,:descripcion,:fecha,:horainicio,:horafin)");
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':horainicio', $horainicio);
        $statement->bindParam(':horafin', $horafin);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarEvento($id_evento, $nombre, $descripcion, $fecha, $horainicio, $horafin)
    {
        $statement = $this->db->prepare("UPDATE `tbl_eventos` SET `nombre`=:nombre,`descripcion`=:descripcion,`fecha`=:fecha,`horainicio`=:horainicio,`horafin`=:horafin WHERE id_evento=:id_evento");
        $statement->bindParam(':id_evento', $id_evento);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':horainicio', $horainicio);
        $statement->bindParam(':horafin', $horafin);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarEvento($evento)
    {
        $statement = $this->db->prepare("DELETE FROM `tbl_eventos` WHERE id_evento= :evento");
        $statement->bindParam(':evento', $evento);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
