<?php  


class SubcategoriaControlador{

    static public function insertarSubcategoriaControlador(){

        if(isset($_POST['nuevaSubcategoria'])){

            $tabla="subcategoria";
            $datos=$_POST['nuevaSubcategoria'];

            $respuesta=ModeloSubcategoria::mdlGuardarSubcategoria($tabla,$datos);

            if($respuesta=='ok'){
                echo'<script>

            swal({
                  type: "success",
                  title: "La subcategoria ha sido guardado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "productos";

                            }
                        })

            </script>';
          }else{
            echo '<script>
                         
            swal({
                type: "error",
                title: "¡oops a ocurrido un error!",
                showConfirmButton:true,
                confirmButtonText: "Cerrar",
                closeonConfirm: false
               
               }).then((result)=>{

                   if(result.value){
                       window.location= "productos";
                   }
               });
            </script>';
          }
            }

        }


         /*--======================================================
        MOSTRAR CATEGORIAS
  =========================================================--  */

  static public function mostrarSubCategorias($item,$valor){
    $tabla="subcategoria";
    $respuesta=ModeloSubcategoria::mdlMostrarCategorias($tabla,$item,$valor);
    return $respuesta;
}
}








?>