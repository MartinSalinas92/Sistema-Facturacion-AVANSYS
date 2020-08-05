<?php

class ControladorMarcas{

     /*--======================================================
        CREAR MARCAS
  =========================================================--  */

    static public function crearMarcas(){
        if(isset($_POST['nuevaMarca'])){
             /*VALIDAMOS LOS CAMPOS*/

             if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMarca"])){
                 $tabla="marcas";
                 $datos=$_POST['nuevaMarca'];
                 $respuesta=MoledoMarca::ctrcrearMarca($tabla,$datos);

                 if($respuesta=="ok"){
                    echo'
                    <script>
                    swal({
                        type: "success",
                        title: "¡La marca ha sido guardado correctamente!",
                        showConfirmButton:true,
                        confirmButtonText: "Cerrar",
                        closeonConfirm: false
                       
                       }).then((result)=>{

                           if(result.value){
                               window.location= "marcas";
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
                           window.location= "marcas";
                       }
                   });
                </script>';
                 }

        }

    }
       /*--======================================================
        MOSTRAR MARCAS
  =========================================================--  */
    static public function crtmostrarMarcas($item,$valor){
        $tabla="marcas";
        $respuesta=MoledoMarca::mdlMostrarMarcas($tabla,$item,$valor);
        return $respuesta;
    }
    /*--======================================================
        EDITAR CATEGORIAS
  =========================================================--  */
  static public function ctrEditarMarca(){
    if(isset($_POST["editarMarca"])){

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMarca"])){
        $tabla="marcas";
        $datos=array(
            "id_marca"=>$_POST['idMarca'],
            "nombre"=>$_POST['editarMarca']);
        $respuesta=MoledoMarca::mdlEditarMarca($tabla,$datos);
       
        if($respuesta == "ok"){
            echo'<script>

            swal({
                  type: "success",
                  title: "La marca ha sido modificado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "marcas";

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
                       window.location= "marcas";
                   }
               });
            </script>';
          


        }


      }
    }
  }
}