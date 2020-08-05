<?php

require_once 'conexion.php';

class ModelosUsuarios{
    /*--======================================================
        MOSTRAR USUARIOS
  =========================================================--  */
   static public function MdlMostrarUsuarios($tabla,$item,$valor){

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
        GUARDAR USUARIOS
  =========================================================--  */

  static public function mdlGuardarUsuarios($tabla,$datos){
      $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,usuario,password,perfil,foto) VALUES (:nombre,:usuario,:password,:perfil,:foto)" );
      $stmt->bindParam(":nombre", $datos['nombre'],PDO::PARAM_STR);
      $stmt->bindParam(":usuario", $datos['usuario'],PDO::PARAM_STR);
      $stmt->bindParam(":password", $datos['password'],PDO::PARAM_STR);
      $stmt->bindParam(":perfil", $datos['perfil'],PDO::PARAM_STR);
      $stmt->bindParam(":foto", $datos['foto'],PDO::PARAM_STR);

      if($stmt->execute()){
          return "ok";
      }else{
          return 'error';
      }
      $stmt->close();
      $stmt=null;
      /*EL METODOS PDO::PARAM_STR SIRVER SOLO PARA TRAER STRING  */
  }
  /*--======================================================
        EDITAR USUARIOS
  =========================================================--  */

  static public function mdlEditarUsuarios($tabla,$datos){
    $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, usuario = :usuario, password = :password, perfil = :perfil, foto = :foto  WHERE usuario = :usuario"  );
    $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
    $stmt->bindParam(":perfil", $datos['perfil'], PDO::PARAM_STR);
    $stmt->bindParam(":foto", $datos['foto'], PDO::PARAM_STR);

    if($stmt->execute()){
            return 'ok';
    }else{
        return 'error';
    }
    $stmt->close();
    $stmt=null;

}

/*--======================================================
        MODIFICAR y ACTIVAR USUARIOS
  =========================================================--  */

static public function activarUsuarios($tabla, $item1, $valor, $item2,$valor2){
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
        ELIMINAR USUARIOS
  =========================================================--  */

  static public function mdlBorrarUsuario($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");

    $stmt -> bindParam(":id_usuario", $datos, PDO::PARAM_INT);

    if($stmt -> execute()){

        return "ok";
    
    }else{

        return "error";	

    }

    $stmt -> close();

    $stmt = null;


}


}




  