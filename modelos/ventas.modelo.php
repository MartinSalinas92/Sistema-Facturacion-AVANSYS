<?php

require_once 'conexion.php';


class ModeloVentas{

    
    /*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function MdlMostrarVentas($item,$valor,$tabla,$fechaInicial,$fechaFinal){
        if($item != null){
            $consulta= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= $valor  ORDER BY id_factura desc");
            $consulta->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $consulta->execute();
            return $consulta->fetch();

        }else if($fechaInicial == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_factura asc");
    
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
    


    static public function MdlMostrarVentasReportess($item,$valor,$tabla,$fechaInicial,$fechaFinal){
        if($item != null){
            $consulta= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= $valor  ORDER BY id_factura desc");
            $consulta->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $consulta->execute();
            return $consulta->fetch();

        }else if($fechaInicial == null){

            $stmt = Conexion::conectar()->prepare("SELECT SUM(total_general) AS Total,
            DATE(fecha) AS Mes
            FROM factura
            GROUP BY Mes;");
    
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
    




    

    static public function mdlMostrarVentasPorfecha($item,$valor,$tabla,$fechaInicial,$fechaFinal){
       /* if($item != null){
            $consulta= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= $valor  ORDER BY id_factura desc");
            $consulta->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $consulta->execute();
            return $consulta->fetch();

        }else{*/
            
        if($fechaInicial == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_factura desc");

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
    


    
    
    
 /*=============================================
	CONSULTA VENTA POR MES
    =============================================*/
    static public function MdlMostrarVentasporMes($item,$valor,$tabla,$fechaInicial,$fechaFinal){
       if($fechaInicial == null){
           $stmt1= Conexion::conectar()->prepare("SELECT SUM(total_general)AS total, MONTHNAME(fecha) AS mes FROM $tabla GROUP BY MONTH(fecha) DESC;");
           $stmt1->execute();
           return $stmt1->fetchAll();

         /* }else if( date('Y-m',strtotime($fechaInicial)) == date('Y-m',strtotime($fechaFinal)) ){
            $mes =date('Y-m',strtotime($fechaInicial));
            $stmt = Conexion::conectar()->prepare("SELECT SUM(total_general)AS total,MONTHNAME(fecha) AS mes FROM $tabla WHERE MONTHNAME(fecha)=MONTHNAME(fecha) GROUP BY mes; ");

             $stmt -> execute();

            return $stmt->fetchAll();

            }else{
             $stmt= Conexion::conectar()->prepare("SELECT SUM(total_general) as 'Total',CONCAT( YEAR(fecha),'-',MONTH(fecha)) as 'mes' FROM $tabla WHERE $fechaInicial BETWEEN '$fechaInicial' and '$fechaFinal' GROUP BY MONTH(fecha)");
            $stmt->execute();
             return $stmt->fetchAll();*/
         }
    }


    


    
 /*=============================================
	MOSTRAR LOS DETALLES DE FACTURA
	=============================================*/
    
    static public function MdlMostrarDetalles($item2,$idfactura,$tabla1){
        if(isset($item2)){
            $consulta1=Conexion::conectar()->prepare("SELECT * FROM  $tabla1 WHERE $idfactura= $item2");
            $consulta1->bindParam(":".$idfactura, $item2, PDO::PARAM_STR);
            $consulta1->execute();
            return $consulta1->fetchAll();
        }else{
            return "No se ha podido cargar el detalle";

            
        }
    }

       
 /*=============================================
	MOSTRAR LOS DETALLES DE FACTURA DE LOS PRODUCTOS MAS VENDIDOS
    =============================================*/

    
    static public function MdlMostrasVentasMasvendidas($tabla,$item){
        if($item==null){
            $consulta=Conexion::conectar()->prepare("SELECT 
                sum(detalle_factura.`cantidad`) AS total_cantidad,
                productos.`descripcion`
                FROM detalle_factura
                INNER JOIN productos ON detalle_factura.`producto_id`= productos.`id_producto` 
                GROUP BY producto_id ORDER BY total_cantidad  DESC LIMIT 0,10;
            
            ");
            $consulta->execute();
            return $consulta->fetchAll();
        }
    }

    /*=============================================
	MOSTRAR VENDEDORES CON MAS VENTAS GENERADAS
    =============================================*/
    
    static public function mdlMostrarVendedores($tabla){
     $consulta=Conexion::conectar()->prepare( "SELECT 
       SUM(factura.`total_general`) AS total_cantidad,
       usuarios.`nombre`
       FROM factura
       INNER JOIN usuarios ON factura.`usuario_id`= usuarios.`id_usuario` 
       GROUP BY usuario_id ORDER BY total_cantidad  DESC LIMIT 0,10;");
       $consulta->execute();
       return $consulta->fetchAll(); 

    }





 /*=============================================
	GUARDAR VENTAS
	=============================================*/

static public function mdlGuardarVentas($datos,$datos2,$tabla){
    $date = date('Y-m-d');
        $stmt= Conexion::conectar()->prepare("INSERT INTO factura(fecha,tipo_factura,codigo_factura,tipo_pago,total_general,usuario_id,cliente_id,impuesto) VALUES ('$date',:tipo_factura,:codigo_factura,:tipo_pago,:total_general,:usuario_id,:cliente_id, :impuesto)");
        $stmt->bindParam(":tipo_factura",$datos['tipo_factura'],PDO::PARAM_STR);
        $stmt->bindParam(":codigo_factura",$datos['codigo_factura'],PDO::PARAM_STR);
        $stmt->bindParam(":tipo_pago",$datos['tipo_pago'],PDO::PARAM_STR);
        $stmt->bindParam(":total_general",$datos['total_general'],PDO::PARAM_STR);
        $stmt->bindParam(":usuario_id",$datos['usuario_id'],PDO::PARAM_INT);
        $stmt->bindParam(":cliente_id",$datos['cliente_id'],PDO::PARAM_INT);
        $stmt->bindParam(":impuesto",$datos['impuesto'],PDO::PARAM_STR);

        if($stmt->execute()){
            // CONSULTA PARA TRAER EL ULTIMO ID
             $stmt11= Conexion::conectar()->prepare("SELECT id_factura FROM factura ORDER BY id_factura DESC LIMIT 0,1");
            $stmt11->execute(); 
            $respuesta= $stmt11->fetch();
            $producto= json_decode($datos2['producto_id'], true);
                foreach ($respuesta as $value){
                    $resultado= $value;
                }
            $st=5555;
            foreach ($producto as $value) {
                $id=$value['id'];
                $stmt1=Conexion::conectar()->prepare("INSERT INTO detalle_factura(cantidad,precio,descuento,interes,factura_id,producto_id,subTotal) VALUES (:cantidad,:precio,:descuento,:interes,:factura_id,:producto_id,:subTotal)");
                
                   
                $stmt1->bindParam(":cantidad",$value['cantidad'],PDO::PARAM_STR);
                $stmt1->bindParam(":precio",$value['precio'],PDO::PARAM_STR);
                $stmt1->bindParam(":descuento",$value['descuento'],PDO::PARAM_INT);
                $stmt1->bindParam(":interes",$value['interes'],PDO::PARAM_INT);
                $stmt1->bindParam(":factura_id",$resultado,PDO::PARAM_INT);
                $stmt1->bindParam(":producto_id",$value['id'],PDO::PARAM_INT);
                $stmt1->bindParam(":subTotal",$value['total'],PDO::PARAM_STR);

                $stmt1->execute();
                 $st = $stmt1->errorInfo(); 
                 
            }
            
            return $st='ok';            
                    
                    //while($num_elemento< count($datos2['producto_id'])){
                       
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

}

}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

    }
    
    /*=============================================
	SUMAR EL TOTAL DE VENTAS
	=============================================*/

	static public function mdlSumaTotalVentas($tabla,$item){	

		$stmt = Conexion::conectar()->prepare("SELECT SUM(cantidad) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }
     /*=============================================
	MOSTRAR CLIENTES CON MAS PRODUCTOS COMPRADOS
    =============================================*/
    static public function mdlMostrarClientesFrecuentes($tabla){
        $consulta=Conexion::conectar()->prepare("SELECT 
            SUM(detalle_factura.`cantidad`) AS total_cantidad,
            personas.`apellido`,personas.`nombre`
            FROM factura
            INNER JOIN clientes ON factura.`cliente_id`=clientes.`id_cliente`
            INNER JOIN personas ON personas.`id_persona` = clientes.`persona_id`
            INNER JOIN detalle_factura ON detalle_factura.`factura_id`=factura.`id_factura`
            GROUP BY cliente_id ORDER BY total_cantidad DESC LIMIT 0,10;
        
        ");
        $consulta->execute();
        return $consulta-> fetchAll();

    }

    static public function mdlmostrarTotalPrecios($item,$tabla){
        $consulta=Conexion::conectar()->prepare("SELECT
        SUM(total_general) AS total
        FROM $tabla WHERE fecha >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH);");

        $consulta->execute();
        return $consulta->fetch();
    }

    static public function ActivarFactura($tabla,$item1,$estado,$item2,$id_user){
        $consulta=Conexion::conectar()->prepare("UPDATE $tabla SET estado = :estado WHERE id_factura = :id_factura");
        $consulta->bindParam(":estado",$estado,PDO::PARAM_STR);
        $consulta->bindParam(":id_factura",$id_user,PDO::PARAM_INT);

        if($consulta->execute()){
        return 'ok';
    }else{
            return 'error';
        }
    }
    

    static public function mostrarDevolucionVentas($item,$valor){

        $consulta=Conexion::conectar()->prepare("SELECT 
        factura.`id_factura` as id_factura,
        factura.`codigo_factura` as cod_factura,
        clientes.`persona_id`,
        personas.`nombre`as nombre,
        personas.`apellido` as apellido,
        productos.`descripcion` as descripcion
        FROM factura
        INNER JOIN clientes ON factura.`cliente_id`=clientes.`id_cliente`
        INNER JOIN personas ON clientes.`persona_id`=personas.`id_persona`
        INNER JOIN detalle_factura ON detalle_factura.`factura_id`=factura.`id_factura`
        INNER JOIN productos ON detalle_factura.`producto_id`=productos.`id_producto`
        WHERE $item=$valor;");
        $consulta->bindParam(":".$item,$valor,PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetch();
  
}
static public function mostrarDevolucionVentasmodal($valor){

    $consulta=Conexion::conectar()->prepare("SELECT 
    factura.`id_factura` as id_factura,
    factura.`codigo_factura` as cod_factura,
    clientes.`persona_id`,
    personas.`nombre`as nombre,
    personas.`apellido` as apellido,
    productos.`descripcion` as descripcion
    FROM factura
    INNER JOIN clientes ON factura.`cliente_id`=clientes.`id_cliente`
    INNER JOIN personas ON clientes.`persona_id`=personas.`id_persona`
    INNER JOIN detalle_factura ON detalle_factura.`factura_id`=factura.`id_factura`
    INNER JOIN productos ON detalle_factura.`producto_id`=productos.`id_producto`
    WHERE id_factura=$valor;");
    $consulta->bindParam(":".$item,$valor,PDO::PARAM_STR);
    $consulta->execute();
    return $consulta->fetchAll();

}

static public function mdlMostrarCantidadProductosPorMes($fechaInicial,$fechaFinal,$tabla){ 
    if($fechaInicial == $fechaFinal){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

    $stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

    $stmt -> execute();

    return $stmt -> fetchAll();

}else{
    $stmt= Conexion::conectar()->prepare(" SELECT 
 SUM(detalle_factura.`cantidad`) AS total_cantidad,
 factura.`fecha`,
 detalle_factura.`factura_id`,
 productos.`descripcion`
  FROM detalle_factura
  INNER JOIN productos ON detalle_factura.`producto_id`= productos.`id_producto` 
  INNER JOIN factura ON detalle_factura.`factura_id`=factura.`id_factura`
  WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal';
 ;");
    $stmt->execute();
     return $stmt->fetchAll();
}

    
}
    
}

