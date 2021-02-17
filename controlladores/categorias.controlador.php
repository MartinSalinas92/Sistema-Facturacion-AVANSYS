<?php

class ControladorCategorias{

    
 /*--======================================================
        CREAR USUARIOS
  =========================================================--  */

    static public function ctrCrearCategoria(){

        if(isset($_POST['nuevaCategoria'])){

            /*VALIDAMOS LOS CAMPOS*/

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

                $tabla="categorias";
                $datos=$_POST['nuevaCategoria'];
                $respuesta=ModeloCategorias::mdlCrearCategorias($tabla,$datos);

                if($respuesta=='ok'){
                    echo'
                    <script>
                    swal({
                        type: "success",
                        title: "¡La categoria ha sido guardado correctamente!",
                        showConfirmButton:true,
                        confirmButtonText: "Cerrar",
                        closeonConfirm: false
                       
                       }).then((result)=>{

                           if(result.value){
                               window.location= "categorias";
                           }
                       });
                    </script>';
                }

            }else{
                echo '<script>
                         
                swal({
                    type: "error",
                    title: "¡La categoria no puede ir vacio o llevar caracteres especiales!",
                    showConfirmButton:true,
                    confirmButtonText: "Cerrar",
                    closeonConfirm: false
                   
                   }).then((result)=>{

                       if(result.value){
                           window.location= "categorias";
                       }
                   });
                </script>';
            }

        }

    }

      
    /*--======================================================
        MOSTRAR CATEGORIAS
  =========================================================--  */

  static public function mostrarCategorias($item,$valor){
      $tabla="categorias";
      $respuesta=ModeloCategorias::mdlMostrarCategorias($tabla,$item,$valor);
      return $respuesta;
  }

   /*--======================================================
        EDITAR CATEGORIAS
  =========================================================--  */
  static public function ctrEditarCategoria(){
    if(isset($_POST["editarNombre"])){

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){
        $tabla="categorias";
        $datos=array(
            "id_categoria"=>$_POST['idCategoria'],
            "nombre"=>$_POST['editarNombre']
        );
        $respuesta=ModeloCategorias::mdlEditarCategorias($tabla,$datos);
       
        if($respuesta == "ok"){
            echo'<script>

            swal({
                  type: "success",
                  title: "La categoria ha sido modificado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "categorias";

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
                       window.location= "categorias";
                   }
               });
            </script>';
          


        }


      }
    }
  }

   /*--======================================================
        BORRAR CATEGORIAS
  =========================================================--  */

  static public function BorrarCategorias(){
      if(isset($_GET['idCategoria'])){
          $tabla='categorias';
          $datos=$_GET['idCategoria'];

        

          $respuesta=ModeloCategorias::mdlBorrarCategorias($tabla,$datos);

         

          if($respuesta == "ok"){
            echo'<script>

            swal({
                  type: "success",
                  title: "La categoria ha sido borrado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "categorias";

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
                       window.location= "categorias";
                   }
               });
            </script>';
          }
      }
  }


}

?>