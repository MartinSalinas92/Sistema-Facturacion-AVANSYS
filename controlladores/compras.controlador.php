<?php

class ControladorCompra{

    static public function ctrCrearCompra(){
        /*=============================================
	CREAR VENTAS
    =============================================*/
        if(isset($_POST["nuevaVenta"])){

               
               $tabla="detalle_compra";

               /*=============================================
			ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
            =============================================*/
            
            $listarProductos= json_decode($_POST['listarProductos'], true);



               $datos=array(
                    'usuario_id'=>$_POST['idVendedor'],
                    'proveedor_id'=>$_POST['idProveedor'],
                    'impuesto'=>$_POST['nuevoImpuestoVenta'],
                    'codigo_factura'=>$_POST['nuevaVenta'],
                   'tipo_factura'=>$_POST['idtipo_factura'],
                   'tipo_pago'=>$_POST['nuevoMetodoPago'],
                   'total_general'=>$_POST['nuevoTotalVenta'],
                   
                   
               );

               $datos2=array(
                   'producto_id'=> $_POST['listarProductos'],
               );

               $respuesta=ModeloCompras::mdlGuardarCompras($datos,$datos2,$tabla);

                   
        if($respuesta== 'ok'){
            echo'
            <script>
            swal({
                type: "success",
                title: "¡La compra ha sido guardado correctamente!",
                showConfirmButton:true,
                confirmButtonText: "Cerrar",
                closeonConfirm: false
               
               }).then((result)=>{

                   if(result.value){
                       window.location= "compras";
                   }
               });
            </script>';
        }else{
            echo '<script>
            
            console.log("'.$respuesta.'");  

           
                         
                swal({
                    type: "error",
                    title: "¡La compra no pudo ser guardada!",
                    showConfirmButton:true,
                    confirmButtonText: "Cerrar",
                    closeonConfirm: false
                   
                   }).then((result)=>{

                       if(result.value){
                           window.location= "compras";
                       }
                   });
                </script>';
        }
            
               }


        }

        static public function ctrMostrarCompras($fechaInicial,$fechaFinal,$item,$valor){
            $tabla="compras";
            $respuesta= ModeloCompras::mdlMostrarCompras($fechaInicial,$fechaFinal,$tabla,$item,$valor);
            return $respuesta;

        }

        static public function ctrMostrarComprasss($fechaInicial,$fechaFinal,$item,$valor){
            $tabla="compras";
            $respuesta=ModeloCompras::mdlMostrarComprasss($fechaInicial,$fechaFinal,$tabla,$item,$valor);
            return $respuesta;
        }

        static public function ctrMostrarComprasDetalles($item,$valor){
            $tabla="compras";
            $respuesta=ModeloCompras::mdlMostrarComp($tabla,$item,$valor);
            return $respuesta;
        }

        static public function ctrMostrarDetalles($valor){
            $tabla1="detalle_compra";
            $item="compra_id";
            $respuesta1=ModeloCompras::mdlMostrardetallesCompras($valor,$tabla1,$item);
            return $respuesta1;

        }

    }


?>