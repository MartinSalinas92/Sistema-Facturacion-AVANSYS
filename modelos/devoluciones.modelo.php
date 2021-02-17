
<?php

require_once 'conexion.php';

class ModeloDevoluciones{

    static public function mdlGuardarDevoluciones($tabla,$datos){
        $date = date('Y-m-d');
        $consulta=Conexion::conectar()->prepare("INSERT INTO $tabla(cliente_id,vendedor_id,producto_id,motivo,fecha) VALUES (:cliente_id,:vendedor_id,:producto_id,:motivo,'$date')");


        $consulta->bindParam(":motivo", $datos['motivo'],PDO::PARAM_STR);
        $consulta->bindParam(":cliente_id", $datos['cliente_id'],PDO::PARAM_INT);
        $consulta->bindParam(":vendedor_id", $datos['vendedor_id'],PDO::PARAM_INT);
        $consulta->bindParam(":producto_id", $datos['producto_id'],PDO::PARAM_INT);
     

        if($consulta->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $consulta->close();
        $consulta=null;
    }

    static public function mdlMostrarDevoluciones($tabla){
        $consulta=Conexion::conectar()->prepare("SELECT
        devoluciones.`producto_id`,
        devoluciones.`fecha`,
        devoluciones.`motivo`,
        usuarios.`nombre`AS Vendedor,
        personas.`nombre` AS cliente,
        productos.`descripcion`AS productos
        FROM $tabla
        INNER JOIN usuarios ON devoluciones.`vendedor_id`=usuarios.`id_usuario`
        INNER JOIN clientes ON devoluciones.`cliente_id`=clientes.`id_cliente`
        INNER JOIN personas ON clientes.`persona_id`=personas.`id_persona`
        INNER JOIN productos ON devoluciones.`producto_id`=productos.`id_producto`;");

        $consulta->execute();
        return $consulta->fetchAll();
    }

    static public function mdlMostrarde($tabla,$item,$valor){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= $valor; ");
        $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
       $stmt->execute();
       return $stmt->fetch();
    }

}