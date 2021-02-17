<?php

class ModeloCompras{

    static public function mdlGuardarCompras($datos,$datos2,$tabla){
        $date = date('Y-m-d');
        $stmt= Conexion::conectar()->prepare("INSERT INTO compras(usuario_id,proveedor_id,impuesto,codigo_factura,tipo_factura,tipo_pago,total_general,fecha) VALUES (:usuario_id,:proveedor_id,:impuesto,:codigo_factura,:tipo_factura,:tipo_pago,:total_general,'$date')");

        $stmt->bindParam(":usuario_id",$datos['usuario_id'],PDO::PARAM_INT);
        $stmt->bindParam(":proveedor_id",$datos['proveedor_id'],PDO::PARAM_INT);
        $stmt->bindParam(":impuesto",$datos['impuesto'],PDO::PARAM_STR);
        $stmt->bindParam(":codigo_factura",$datos['codigo_factura'],PDO::PARAM_STR);
        $stmt->bindParam(":tipo_factura",$datos['tipo_factura'],PDO::PARAM_STR);
        $stmt->bindParam(":tipo_pago",$datos['tipo_pago'],PDO::PARAM_STR);
        $stmt->bindParam(":total_general",$datos['total_general'],PDO::PARAM_STR);

        if($stmt->execute()){
            // CONSULTA PARA TRAER EL ULTIMO ID
             $stmt11= Conexion::conectar()->prepare("SELECT id_compra FROM compras ORDER BY id_compra DESC LIMIT 0,1");
            $stmt11->execute(); 
            $respuesta= $stmt11->fetch();
            $producto= json_decode($datos2['producto_id'], true);
                foreach ($respuesta as $value){
                    $resultado= $value;
                }
            $st=5555;
            foreach ($producto as $value) {
                $id=$value['id'];
                $stmt1=Conexion::conectar()->prepare("INSERT INTO detalle_compra(cantidad,precio,descuento,interes,compra_id,producto_id,subtotal) VALUES (:cantidad,:precio,:descuento,:interes,:compra_id,:producto_id,:subtotal)");
                
                   
                $stmt1->bindParam(":cantidad",$value['cantidad'],PDO::PARAM_STR);
                $stmt1->bindParam(":precio",$value['precio'],PDO::PARAM_STR);
                $stmt1->bindParam(":descuento",$value['descuento'],PDO::PARAM_STR);
                $stmt1->bindParam(":interes",$value['interes'],PDO::PARAM_STR);
                $stmt1->bindParam(":compra_id",$resultado,PDO::PARAM_INT);
                $stmt1->bindParam(":producto_id",$value['id'],PDO::PARAM_INT);
                $stmt1->bindParam(":subtotal",$value['total'],PDO::PARAM_STR);

                $stmt1->execute();
                 $st = $stmt1->errorInfo(); 
            }
            
            return $st='ok';            
        }

    }

    static public function mdlMostrarCompras($fechaInicial,$fechaFinal,$tabla,$item,$valor){
        if($item != null){
            $consulta= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= $valor  ORDER BY id_compra desc");
            $consulta->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $consulta->execute();
            return $consulta->fetch();

        }else{
            if($fechaInicial == null){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_compra asc");
    
                $stmt -> execute();
    
                return $stmt -> fetchAll();	
    
    
            }else if($fechaInicial == $fechaFinal){
    
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");
    
                $stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);
    
                $stmt -> execute();
    
                return $stmt -> fetchAll();
    
            }else{
                $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' and '$fechaFinal'");
                $stmt->execute();
                 return $stmt->fetchAll();
            }

        }
    }

    static public function mdlMostrarComprasss($fechaInicial,$fechaFinal,$tabla,$item,$valor){
        /* if($item != null){
             $consulta= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= $valor  ORDER BY id_factura desc");
             $consulta->bindParam(":".$item, $valor, PDO::PARAM_STR);
 
             $consulta->execute();
             return $consulta->fetch();
 
         }else{*/
             
         if($fechaInicial == null){
 
             $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_compra asc");
 
             $stmt -> execute();
 
             return $stmt -> fetchAll();	
 
 
         }else if($fechaInicial == $fechaFinal){
 
             $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");
 
             $stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);
 
             $stmt -> execute();
 
             return $stmt -> fetchAll();
 
         }else{
             $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' and '$fechaFinal'");
             $stmt->execute();
              return $stmt->fetchAll();
         }
 
        }


        static public function mdlMostrardetallesCompras($valor,$tabla1,$item){
            if(isset($valor)){
                $consulta1=Conexion::conectar()->prepare("SELECT * FROM $tabla1 WHERE $item= $valor");
                $consulta1->bindParam(":".$item,$valor, PDO::PARAM_STR);
                $consulta1->execute();
                return $consulta1->fetchAll();
            }else{
                return  'no se ha podido cargar los detalles de compra';
    
            }
            
                
        }

        static public function mdlMostrarComp($tabla,$item,$valor){
            if(isset($valor)){
                $consulta1=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= $valor");
                $consulta1->bindParam(":".$item,$valor,PDO::PARAM_STR);
                $consulta1->execute();
                return $consulta1->fetch();
            }else{
                return 'no se ha podido cargar los detalles';
            }
        }

    }


?>