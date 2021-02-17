<?php

class ControladorVenta{

    static public function ctrMostrarVentas($item,$valor,$fechaInicial,$fechaFinal){
        $tabla="factura";

        $respuesta=ModeloVentas::MdlMostrarVentas($item,$valor,$tabla,$fechaInicial,$fechaFinal);
        return $respuesta;

        
        
    }
    static public function ctrMostrarVentasss($item,$valor,$fechaInicial,$fechaFinal){
        $tabla="factura";

    $respuesta=ModeloVentas::mdlMostrarVentasPorfecha($item,$valor,$tabla,$fechaInicial,$fechaFinal);
            return $respuesta;

        
            
            
        
        
        
            
    }
    static public function ctrMostrarVentasporFecha($item,$valor,$fechaInicial,$fechaFinal){
        $tabla="factura";

        $respuesta2=ModeloVentas::MdlMostrarVentasporMes($item,$valor,$tabla,$fechaInicial,$fechaFinal);
        return $respuesta2;
    }

    static public function ctrMostrardetalles($item2){
        $tabla1="detalle_factura";
        $idfactura = "factura_id";
        $respuesta1=ModeloVentas::MdlMostrarDetalles($item2,$idfactura,$tabla1);
        return $respuesta1;
    }

    static public function ctrMostrardetallesCantidadProductos($item){

        $tabla="detalle_factura";
        $respuesta=ModeloVentas::MdlMostrasVentasMasvendidas($tabla,$item);
        return $respuesta;
    }
    




   /*=============================================
	CREAR VENTAS
    =============================================*/

    static public function ctrCrearVentas(){
        if(isset($_POST["nuevaVenta"])){

               
               $tabla="detalle_factura";

               /*=============================================
			ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
            =============================================*/
            
            $listarProductos= json_decode($_POST['listarProductos'], true);


            

               $datos=array(
                   'tipo_factura'=>$_POST['idtipo_factura'],
                   'codigo_factura'=>$_POST['nuevaVenta'],
                   'tipo_pago'=>$_POST['nuevoMetodoPago'],
                   'total_general'=>$_POST['nuevoTotalVenta'],
                   'impuesto'=>$_POST['nuevoImpuestoVenta'],
                   'cliente_id'=>$_POST['idCliente'],
                   'usuario_id'=>$_POST['idVendedor'],

               );

               $datos2=array(
                   'producto_id'=> $_POST['listarProductos'],
               );

               $respuesta=ModeloVentas::mdlGuardarVentas($datos,$datos2,$tabla);

                   
        if($respuesta== 'ok'){
            echo'
            <script>
            swal({
                type: "success",
                title: "¡La venta ha sido guardado correctamente!",
                showConfirmButton:true,
                confirmButtonText: "Cerrar",
                closeonConfirm: false
               
               }).then((result)=>{

                   if(result.value){
                       window.location= "ventas";
                   }
               });
            </script>';
        }else{
            echo '<script>
            
            console.log("'.$respuesta.'");  

           
                         
                swal({
                    type: "error",
                    title: "¡La venta no pudo ser guardada!",
                    showConfirmButton:true,
                    confirmButtonText: "Cerrar",
                    closeonConfirm: false
                   
                   }).then((result)=>{

                       if(result.value){
                           window.location= "ventas";
                       }
                   });
                </script>';
        }
            
               }

        }

        /*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	static public function ctrSumaTotalVentas($item){

		$tabla = "detalle_factura";

		$respuesta = ModeloVentas::mdlSumaTotalVentas($tabla,$item);

		return $respuesta;




        

    }

      /*=============================================
	SUMA TOTAL PRECIOS
    =============================================*/
    static public function totalPrecios($item){
        $tabla="factura";
        $respuesta=ModeloVentas::mdlTotalPrecios($item,$tabla);
        return $respuesta;
    }
    
        /*=============================================
	MOSTRAR VENTAS DE VENDEDORES CON MAS VENTAS GENERADAS
    =============================================*/
    
    static public function ctrMostrarVendedores(){
        $tabla="factura";
        $respuesta=ModeloVentas::mdlMostrarVendedores($tabla);

        return $respuesta;

    }
      /*=============================================
	MOSTRAR CLIENTES CON MAS PRODUCTOS COMPRADOS
    =============================================*/
    static public function ctrMostrarClientesFrecuentes(){
        $tabla="factura";
        $respuesta=ModeloVentas::mdlMostrarClientesFrecuentes($tabla);
        return $respuesta;

    }


}


