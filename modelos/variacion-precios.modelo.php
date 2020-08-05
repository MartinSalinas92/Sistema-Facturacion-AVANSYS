<?php

require_once 'conexion.php';

class ModeloVariacion{

    static public function mdlMostrarVariaciones($tabla){
        $consulta=Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $consulta->execute();

        return $consulta->fetchAll();
    }
}

?>