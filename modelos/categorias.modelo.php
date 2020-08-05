<?php

require_once 'conexion.php';

class ModeloCategorias{
       /*--======================================================
        GUARDAR CATEGORIAS
  =========================================================--  */

    static public function mdlCrearCategorias($tabla,$datos){
        $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre)VALUES (:nombre)");
        $stmt->bindParam(":nombre", $datos,PDO::PARAM_STR);

        if($stmt->execute()){
            return'ok';
        }else{
            'error';
        }
        $stmt->close();
        $stmt=null;
    }

       /*--======================================================
        MOSTRAR CATEGORIAS
  =========================================================--  */
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

      /*--======================================================
        BORRAR CATEGORIAS
  =========================================================--  */

    static public function mdlBorrarCategorias($tabla,$datos){
        $stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria= :id_categoria");
        $stmt->bindParam(":id_categoria", $datos ,PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return $stmt->errorInfo();


        }
        $stmt->close();
        $stmt=null;
    }
    
/*--======================================================
        ACTIVAR USUARIOS
  =========================================================--  */

static public function activarCategoria($tabla, $item1, $valor, $item2,$valor2){
    $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1  WHERE $item2 = :$item2");
    $stmt->bindParam(":".$item1,$valor,PDO::PARAM_STR );
    $stmt->bindParam(":".$item2,$valor2,PDO::PARAM_STR );

    if($stmt->execute()){
        return 'ok';
    }else{
        return 'error';
    }
    $stmt->close();
    $stmt=null;
}

       /*--======================================================
        EDITAR CATEGORIAS
  =========================================================--  */

  static public function mdlEditarCategorias($tabla,$datos){
    $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_categoria= :id_categoria");
    $stmt->bindParam(":nombre", $datos['nombre'],PDO::PARAM_STR);
    $stmt->bindParam(":id_categoria", $datos['id_categoria'],PDO::PARAM_INT);
    if($stmt->execute()){
        return "ok";
    }else{
        return "error";


    }
    $stmt->close();
    $stmt=null;
}
}