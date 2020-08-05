<?php

class Conexion{
   static public function conectar(){

        /*$link=new pdo('1- la conexion al servidor y el nombre de la base de datos',''2- usuario','3-contraseña') */

        $link=new pdo("mysql:host=localhost;dbname=avansys", "root","");

        $link->exec('set name utf8');
        return $link;
    }
}