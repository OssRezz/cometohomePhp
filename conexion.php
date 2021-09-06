<?php

 class Conexion{

    protected $db;
    private $drive = "mysql";
    private $host = "localhost";
    private $dbname = "cometohomephp";
    private $usuario = "root";
    private $password = "";

    public function __construct(){
     try{
            $db = new PDO("{$this->drive}:host={$this->host};dbname={$this->dbname}", $this->usuario, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
        echo "Fallo la conexion, Problema: " . $e->getMessage();
        }
    }   

}


?>