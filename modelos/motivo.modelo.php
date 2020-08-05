<?php

require_once 'conexion.php';

class ModeloMotivo{

    static public function mdlMostrarMotivo(){

        $stmt=Conexion::conectar()->prepare("SELECT * FROM motivo");
        $stmt->execute();
        return $stmt->fetchAll();


    }
}