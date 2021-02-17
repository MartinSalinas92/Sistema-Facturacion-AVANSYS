

<?php

class Controladordevoluciones{
     /*--======================================================
        CREAR DEVOLUCIONES
  =========================================================--  */

  static public function CrtDevoluciones(){
      if(isset($_POST['idVendedor'])){


        $tabla="devoluciones";

        $datos=array(
        'vendedor_id'=>$_POST['idVendedor'],
        'cliente_id'=>$_POST['nuevoCLiente'],
        'producto_id'=>$_POST['nuevoProducto'],
        'motivo'=>$_POST['motivos'],
        );

        $respuesta=ModeloDevoluciones::mdlGuardarDevoluciones($tabla,$datos);

        if($respuesta=='ok'){
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
}
