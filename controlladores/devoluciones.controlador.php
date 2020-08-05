<?php


class Controladordevoluciones{
     /*--======================================================
        CREAR DEVOLUCIONES
  =========================================================--  */


  static public function CrtDevoluciones(){
      if(isset($_POST['nuevaVentaDevo'])){
          
        if($_POST["listarProductosD"] == ""){

            echo'<script>

        swal({
              type: "error",
              title: "La devolucion no se guarda si no hay productos",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then(function(result){
                        if (result.value) {

                        window.location = "entradas";

                        }
                    })

        </script>';

        return;
    }


        
        
               
        $tabla="detalle_devoluciones";


        



                    $datos=array(
                    'usuario_id'=>$_POST['idVendedor'],
                    'factura_id'=> $_POST['nuevaVentaDevo'],
                    'cliente_id'=>$_POST['idCLientes'],
                    'motivo'=>$_POST['tipoMotivo']
                    );

                    $datos2=array(
                        'producto_id'=> $_POST['listarProductosD']
                    );

        $respuesta=ModeloDevoluciones::mdlGuardarDevoluciones($tabla,$datos,$datos2);

        if($respuesta ==='ok'){
            echo '<script>


            swal({
                  type: "success",
                  title: "La devolucion ha sido realizada con exito",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then((result) => {
                            if (result.value) {

                            window.location = "devoluciones-vistas";

                            }
                        })

            </script>';
        }else{
            echo '<script>
            console.log("'.$respuesta.'"); 

            swal({
                  type: "error",
                  title: "La devolucion no pudo ser realizada",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then((result) => {
                            if (result.value) {

                            window.location = "crear-devoluciones";

                            }
                        })

            </script>';

        }
    }
      }
  

  static public function crtmostrarDevolucion(){
      $tabla='devoluciones';
     
      $respuesta=ModeloDevoluciones::mdlMostrarDevoluciones($tabla);
      return $respuesta;
  }

  static public function crtmostrarDevoluciones($item,$valor){
      $tabla="devoluciones";
      $respuesta=ModeloDevoluciones::mdlMostrarde($tabla,$item,$valor);
      return $respuesta;
  }

  static public function mostrarDetalleDevoluciones($valor){
      $tabla="detalle_devoluciones";
      $item='devolucion_id';

      $respuesta=ModeloDevoluciones::mdlmostrarDetalleDevoluciones($valor,$item,$tabla);
      return $respuesta;
  }

}
