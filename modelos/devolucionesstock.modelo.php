<?php

require_once 'conexion.php';

class ModeloDevolucionesStock{


    static public function mdlGuardarDevolucionesStock($tabla,$datos,$datos2){
        $date = date('Y-m-d');
        
        $idfactura = $datos['factura_id'];

        $stmt12= Conexion::conectar()->prepare("SELECT id_factura FROM factura WHERE codigo_factura=$idfactura LIMIT 0,1");
        $stmt12->execute(); 
        $respuesta= $stmt12->fetch();
      


        $stmt=Conexion::conectar()->prepare("INSERT INTO devolucion_stock(cliente_id,usuario_id,factura_id,motivo,fecha) VALUES (:cliente_id,:usuario_id,:factura_id,:motivo,'$date')");


        $stmt->bindParam(":motivo", $datos['motivo'],PDO::PARAM_STR);
        $stmt->bindParam(":factura_id", $respuesta[0],PDO::PARAM_INT);
        $stmt->bindParam(":cliente_id", $datos['cliente_id'],PDO::PARAM_INT);
        $stmt->bindParam(":usuario_id", $datos['usuario_id'],PDO::PARAM_INT);

    

 if($stmt->execute()){
            // CONSULTA PARA TRAER EL ULTIMO ID
             $stmt11= Conexion::conectar()->prepare("SELECT id_devolucion_stock FROM devolucion_stock ORDER BY id_devolucion_stock DESC LIMIT 0,1");
            $stmt11->execute();
             
            $respuesta= $stmt11->fetch();
          
            $producto= json_decode($datos2['producto_id'], true);
                foreach ($respuesta as $value){
                    $resultado= $value;
                }
            $st=5555;
            foreach ($producto as $value) {
                $id=$value['id'];
                $stmt1=Conexion::conectar()->prepare("INSERT INTO detalle_devolucion_stock(producto_id,cantidad,devolucion_stock_id) VALUES (:producto_id,:cantidad,:devolucion_stock_id)");
                
                $stmt1->bindParam(":producto_id",$value['id'],PDO::PARAM_INT); 
                $stmt1->bindParam(":cantidad",$value['cantidad'],PDO::PARAM_STR);
                $stmt1->bindParam(":devolucion_stock_id",$resultado,PDO::PARAM_INT);

              
               
              if($stmt1->execute()){
                return "ok";
            }else{
                return $value->fetch();
        
        
            }
            
            
      
        }
    }
}

       
    




    static public function mdlMostrarDevolucionesSTOCKK($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_devolucion desc");

        $stmt -> execute();

        return $stmt -> fetchAll();

       
    }

    static public function mdlMostrardeStock($tabla,$item,$valor){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= $valor; ");
        $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
       $stmt->execute();
       return $stmt->fetch();
    }

    static public function mdlmostrarDetalleDevolucionesStock($valor,$item,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item='$valor';");
        $stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();


    }

}
