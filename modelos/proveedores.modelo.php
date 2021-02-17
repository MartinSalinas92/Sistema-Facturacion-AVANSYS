<?php

require_once 'conexion.php';

class ModelosProveedores{
 /*--======================================================
        GUARDAR PROVEEDORES
  =========================================================--  */
    static public function mdlCrearProveedor($tabla1,$datos){
        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla1(razon_social) VALUES (:razon_social)");
        $stmt->bindParam(":razon_social",$datos['razon_social'],PDO::PARAM_STR);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt=null;


       

    
}
 /*--=====================================================
        MOSTRAR  PROVEEDORES
  =========================================================--  */
  static public function mdlMostrarProveedores($tabla,$item,$valor){
      
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
         EDITAR PROVEEDORES
  =========================================================--  */

  static public function mdlEditarProveedores($tabla,$datos){
        $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET razon_social = :razon_social WHERE id_proveedor= :id_proveedor");
        $stmt->bindParam(":razon_social", $datos['razon_social'],PDO::PARAM_STR);
        $stmt->bindParam(":id_proveedor", $datos['id_proveedor'],PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
    
    
        }
        $stmt->close();
        $stmt=null;
    }
/*--======================================================
        ACTIVAR PROVEEDOR
  =========================================================--  */

    static public function ActivarProveedor($tabla, $item1, $estado, $item2,$id_user){
        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET estado= :estado WHERE id_proveedor = :id_proveedor");
        $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
        $stmt->bindParam(":id_proveedor",$id_user,PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return 'error';
        }
        
        $stmt->close();
        $stmt=null;
    

}



        }   