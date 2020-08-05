<?php

require_once 'conexion.php';


class ModeloSubcategoria{

    static public function mdlGuardarSubcategoria($tabla,$datos){

        $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre)VALUES (:nombre)");
        $stmt->bindParam(":nombre", $datos,PDO::PARAM_STR);

        if($stmt->execute()){
            return'ok';
        }else{
            'error';
        }
       
    }

    static public function mdlMostrarCategorias($tabla,$item,$valor){
        if($item!= null){
        
            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla where $item = '$valor'");
            $stmt->bindParam(":".$item, $valor,PDO::PARAM_STR);  /*el metodo bindParam sirve para enlazar parametros */
            $stmt->execute();
            /*if(isset($stmt) && !empty($stmt)){
               return $stmt->errorInfo();
                
            }else{*/
            return $stmt->fetch();
            
    
        }else{
            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

            $stmt->close();
            $stmt=null;
       
    }
}


?>