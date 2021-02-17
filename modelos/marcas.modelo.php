<?php

require_once 'conexion.php';

class MoledoMarca{

 /*--======================================================
        GUARDAR Marcas
  =========================================================--  */

    static public  function ctrcrearMarca($tabla,$datos){
        $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");
        $stmt->bindParam(":nombre",$datos,PDO::PARAM_STR);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt=null;
    }


      /*--======================================================
        MOSTRAR MARCAS
  =========================================================--  */
  static public function mdlMostrarMarcas($tabla,$item,$valor){
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
  /*--======================================================
        EDITAR MARCAS
  =========================================================--  */

  static public function mdlEditarMarca($tabla,$datos){
    $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_marca= :id_marca");
    $stmt->bindParam(":nombre", $datos['nombre'],PDO::PARAM_STR);
    $stmt->bindParam(":id_marca", $datos['id_marca'],PDO::PARAM_INT);
    if($stmt->execute()){
        return "ok";
    }else{
        return "error";


    }
    $stmt->close();
    $stmt=null;
}
/*--======================================================
        ACTIVAR MARCAS
  =========================================================--  */

    static public function ActivarMarca($tabla, $item1, $estado, $item2,$id_user){
        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET $item1= :$item1 WHERE $item2 = :$item2");
        $stmt->bindParam(":".$item1,$estado,PDO::PARAM_STR);
        $stmt->bindParam(":".$item2,$id_user,PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return 'error';
        }
        
        $stmt->close();
        $stmt=null;
    

}

}