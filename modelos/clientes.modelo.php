<?php

require_once 'conexion.php';

class ModeloClientes{

    static public function mdlInsertarClientes($tabla,$tabla1,$tabla2,$datos){
        $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla1(nombre,apellido,dni) VALUES (:nombre,:apellido,:dni)");
        $stmt->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(":apellido",$datos['apellido'],PDO::PARAM_STR);
        $stmt->bindParam(":dni",$datos['dni'],PDO::PARAM_STR);

        

        if($stmt->execute()){
            //trae el ultimo ID//
            $stmt11=Conexion::conectar()->prepare("SELECT id_persona FROM personas ORDER BY id_persona DESC LIMIT 0,1");
            $stmt11->execute();
            $respuesta= $stmt11->fetch();
                if($respuesta){
                    foreach($respuesta as $value){
                        $resultado= $value;
                    }
            
                }

                $stmt2=Conexion::conectar()->prepare("INSERT INTO $tabla2(localidad,direccion,nombre_calle,numero_calle,numero_casa,piso_departamento) VALUES (:localidad,:direccion,:nombre_calle,:numero_calle,:numero_casa,:piso_departamento)" );
                $stmt2->bindParam(":localidad",$datos['localidad'],PDO::PARAM_STR);
                $stmt2->bindParam(":direccion",$datos['direccion'],PDO::PARAM_STR);
                $stmt2->bindParam(":nombre_calle",$datos['nombre_calle'],PDO::PARAM_STR);
                $stmt2->bindParam(":numero_calle",$datos['numero_calle'],PDO::PARAM_STR);
                $stmt2->bindParam(":numero_casa",$datos['numero_casa'],PDO::PARAM_STR);
                $stmt2->bindParam(":piso_departamento",$datos['piso_departamento'],PDO::PARAM_STR);

                if($stmt2->execute()){

                    $stmt12=Conexion::conectar()->prepare("SELECT id_direccion FROM direccion ORDER BY id_direccion DESC LIMIT 0,1");
                    $stmt12->execute();
                        $respuesta= $stmt12->fetch();
                            if($respuesta){
                                foreach($respuesta as $values){
                                    $resultado1= $values;
                    }
                }


            $stmt3=Conexion::conectar()->prepare("INSERT INTO $tabla(persona_id,direccion_id) VALUES (:persona_id,:direccion_id)");
                 $stmt3->bindParam(":persona_id", $resultado, PDO::PARAM_INT);
                $stmt3->bindParam(":direccion_id", $resultado1, PDO::PARAM_INT);
                    if($stmt3->execute()){

                        return 'ok';



        }else{
                    return $stmt3->errorInfo();
        }
        }
    }
}

static public  function mdlMostrarClientes($item,$valor,$tabla){

     /*--======================================================
         EDITAR CLIENTES
  =========================================================--  */
    if($item != null){

        $stmt=Conexion::conectar()->prepare("SELECT
         clientes.`id_cliente`,
        personas.`id_persona`,
        direccion.`id_direccion`,
        personas.`nombre`,
        personas.`apellido`,
        personas.`dni`,
        direccion.`localidad`,
        direccion.`direccion`,
        direccion.`nombre_calle`,
        direccion.`numero_calle`,
        direccion.`numero_casa`,
        direccion.`piso_departamento`
        FROM $tabla
        INNER JOIN personas ON clientes.`persona_id`= personas.`id_persona`
        INNER JOIN direccion ON clientes.`direccion_id`= direccion.`id_direccion` WHERE $item= $valor");
    
        $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

    }else{
      /*--======================================================
         MOSTRAR CLIENTES
            =========================================================--  */
            $stmt=Conexion::conectar()->prepare("SELECT 
            clientes.`id_cliente`,
            personas.`id_persona`,
            direccion.`id_direccion`,
            personas.`nombre`,
            personas.`apellido`,
            personas.`dni`,
            direccion.`localidad`,
            direccion.`direccion`,
            direccion.`nombre_calle`,
            direccion.`numero_calle`,
            direccion.`numero_casa`,
            direccion.`piso_departamento`
            FROM $tabla
            INNER JOIN personas ON clientes.`persona_id`= personas.`id_persona`
            INNER JOIN direccion ON clientes.`direccion_id`= direccion.`id_direccion`;");

            $stmt->execute();
            return $stmt->fetchAll();

            }
            $stmt->close();
            $stmt=null;
    }

    static public function mdlEditarClientes($tabla1,$tabla2,$datos){
        $stmt=Conexion::conectar()->prepare("UPDATE $tabla1 SET nombre = :nombre, apellido = :apellido, dni = :dni WHERE id_persona = :id_persona");
        $stmt->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(":apellido",$datos['apellido'],PDO::PARAM_STR);
        $stmt->bindParam(":dni",$datos['dni'],PDO::PARAM_STR);
        $stmt->bindParam(":id_persona",$datos['id_persona'],PDO::PARAM_INT);

        $stmt->execute();

            $stmt1=Conexion::conectar()->prepare("UPDATE $tabla2 SET localidad = :localidad, direccion = :direccion, nombre_calle = :nombre_calle, numero_calle = :numero_calle, numero_casa = :numero_casa, piso_departamento = :piso_departamento WHERE id_direccion = :id_direccion");
            $stmt1->bindParam(":localidad",$datos['localidad'],PDO::PARAM_STR);
            $stmt1->bindParam(":direccion",$datos['direccion'],PDO::PARAM_STR);
            $stmt1->bindParam(":nombre_calle",$datos['nombre_calle'],PDO::PARAM_STR);
            $stmt1->bindParam(":numero_calle",$datos['numero_calle'],PDO::PARAM_STR);
            $stmt1->bindParam(":numero_casa",$datos['numero_casa'],PDO::PARAM_STR);
            $stmt1->bindParam(":piso_departamento",$datos['piso_departamento'],PDO::PARAM_STR);
            $stmt1->bindParam(":id_direccion",$datos['id_direccion'],PDO::PARAM_INT);
      
            if($stmt1->execute()){
               return 'ok';
            }else{
                return 'error';
            }

    }
}
    
    
