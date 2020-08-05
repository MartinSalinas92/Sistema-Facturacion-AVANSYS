<?php

require_once 'conexion.php';

class ModelosProveedores{
 /*--======================================================
        GUARDAR PROVEEDORES
  =========================================================--  */
    static public function mdlCrearProveedor($tabla,$tabla1,$datos){
        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,apellido,dni) VALUES (:nombre,:apellido,:dni)");
        $stmt->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(":apellido",$datos['apellido'],PDO::PARAM_STR);
        $stmt->bindParam(":dni",$datos['dni'],PDO::PARAM_STR);

        if($stmt->execute()){
            // CONSULTA PARA TRAER EL ULTIMO ID
            $stmt11= Conexion::conectar()->prepare("SELECT id_persona FROM personas ORDER BY id_persona DESC LIMIT 0,1");
            $stmt11->execute(); 
            $respuesta= $stmt11->fetch();
                if($respuesta){
                    foreach ($respuesta as $value){
                        $resultado= $value;
                    }
                    // FIN DE CONSULTA ULTIMO ID
                    $stmt1=Conexion::conectar()->prepare("INSERT INTO $tabla1(razon_social,persona_id) VALUES (:razon_social,:persona_id)");
                    $stmt1->bindParam(":razon_social",$datos['razon_social'],PDO::PARAM_STR);
                    $stmt1->bindParam(":persona_id",$resultado,PDO::PARAM_INT);
                    if($stmt1->execute()){
                            return 'ok';
                    }
                    /*
                    $num = 0;
                    while($num < $_POST['variable']){
                        $stmt1=Conexion::conectar()->prepare("INSERT INTO $tabla1(razon_social,persona_id) VALUES (:razon_social,:persona_id)");
                        $stmt1->bindParam(":razon_social",$datos['razon_social'],PDO::PARAM_STR);
                        $stmt1->bindParam(":persona_id",$resultado,PDO::PARAM_INT);
                        if($stmt1->execute()){
                                return 'ok';
                        }
                    }*/
                        

        }else{

            return 'error';
        }

    }
    
}

 /*--======================================================
        MOSTRAR  PROVEEDORES
  =========================================================--  */
  static public function mdlMostrarProveedores($tabla,$item,$valor){
      /*--======================================================
         EDITAR PROVEEDORES
  =========================================================--  */
      if($item != null){
          $stmt=Conexion::conectar()->prepare("SELECT personas.`id_persona`,proveedores.`id_proveedor`, proveedores.`razon_social`, personas.`nombre`,personas.`apellido`, personas.`dni`, proveedores.`estado`,proveedores.`razon_social`
          FROM $tabla 
          INNER JOIN personas ON proveedores.`persona_id`= personas.`id_persona` WHERE $item= '$valor'");
          $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
          $stmt->execute();
          return $stmt->fetch();
          
          

      }else{
           /*--======================================================
         MOSTrAR PROVEEDORES
  =========================================================--  */
    
        $stmt=Conexion::conectar()->prepare("SELECT personas.`id_persona`,proveedores.`id_proveedor`, proveedores.`razon_social`, personas.`nombre`,personas.`apellido`, personas.`dni`, proveedores.`estado`,proveedores.`razon_social`
        FROM $tabla 
        INNER JOIN personas ON proveedores.`persona_id`= personas.`id_persona`;");
        $stmt->execute();
        return $stmt->fetchAll();
    }


        $stmt->close();
        $stmt=null;
   
        
      
  }

             /*--======================================================
         EDITAR PROVEEDORES
  =========================================================--  */

  static public function mdlEditarProveedores($tabla,$tabla1,$datos){
      $stmt=Conexion::conectar()->prepare("UPDATE $tabla1 SET nombre = :nombre, apellido = :apellido, dni = :dni WHERE id_persona = :id_persona");
      $stmt->bindParam(":nombre", $datos['nombre'],PDO::PARAM_STR);
      $stmt->bindParam(":apellido", $datos['apellido'],PDO::PARAM_STR);
      $stmt->bindParam(":dni", $datos['dni'],PDO::PARAM_STR);
      $stmt->bindParam(":id_persona", $datos['id_persona'],PDO::PARAM_INT);
      $stmt->execute();
      
        $stmt1=Conexion::conectar()->prepare("UPDATE $tabla SET razon_social = :razon_social WHERE persona_id = :persona_id ");
        $stmt1->bindParam(":razon_social", $datos['razon_social'],PDO::PARAM_STR);
        $stmt1->bindParam(":persona_id", $datos['id_persona'],PDO::PARAM_INT);


    if($stmt1->execute()){
        return 'ok';
    }else{
        return 'error';
    }

  $stmt->close();
  $stmt= null;
  
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