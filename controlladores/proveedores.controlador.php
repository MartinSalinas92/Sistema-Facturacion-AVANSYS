<?php

class ControladorProveedores{

        /*--======================================================
        CREAR PROVEEDORES
  =========================================================--  */

  static public function ctrCrearProveedores(){
      if(isset($_POST['nuevaRazonSocial'])){
             /*VALIDAMOS LOS CAMPOS*/

             if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaRazonSocial"])&&
             preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST['nuevoNombreProveedor'])&&
             preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST['nuevoApellidoProveedor'])
             ){

            $tabla= "personas";
            $tabla1="proveedores";

            $datos=array(
                'razon_social'=>$_POST['nuevaRazonSocial'],
                'nombre'=>$_POST['nuevoNombreProveedor'],
                'apellido'=>$_POST['nuevoApellidoProveedor'],
                'dni'=>$_POST['nuevodni'],
            );
        $respuesta=ModelosProveedores::mdlCrearProveedor($tabla,$tabla1,$datos);

        if($respuesta== 'ok'){
            echo'
            <script>
            swal({
                type: "success",
                title: "¡El proveedor ha sido guardado correctamente!",
                showConfirmButton:true,
                confirmButtonText: "Cerrar",
                closeonConfirm: false
               
               }).then((result)=>{

                   if(result.value){
                       window.location= "proveedores";
                   }
               });
            </script>';
        }else{
            echo '<script>

           
                         
                swal({
                    type: "error",
                    title: "¡EL proveedor no puede ir vacio o llevar caracteres especiales!",
                    showConfirmButton:true,
                    confirmButtonText: "Cerrar",
                    closeonConfirm: false
                   
                   }).then((result)=>{

                       if(result.value){
                           window.location= "proveedores";
                       }
                   });
                </script>';
        }
            
            
            


      }
  }

}
  static public function ctrCrearProveedoresVentas(){
      if(isset($_POST['nuevaRazonSocial'])){
             /*VALIDAMOS LOS CAMPOS*/

             if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaRazonSocial"])&&
             preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST['nuevoNombreProveedor'])&&
             preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST['nuevoApellidoProveedor'])
             ){

            $tabla= "personas";
            $tabla1="proveedores";

            $datos=array(
                'razon_social'=>$_POST['nuevaRazonSocial'],
                'nombre'=>$_POST['nuevoNombreProveedor'],
                'apellido'=>$_POST['nuevoApellidoProveedor'],
                'dni'=>$_POST['nuevodni'],
            );
        $respuesta=ModelosProveedores::mdlCrearProveedor($tabla,$tabla1,$datos);

        if($respuesta== 'ok'){
            echo'
            <script>
            swal({
                type: "success",
                title: "¡El proveedor ha sido guardado correctamente!",
                showConfirmButton:true,
                confirmButtonText: "Cerrar",
                closeonConfirm: false
               
               }).then((result)=>{

                   if(result.value){
                       window.location= "crear-compras";
                   }
               });
            </script>';
        }else{
            echo '<script>

           
                         
                swal({
                    type: "error",
                    title: "¡EL proveedor no puede ir vacio o llevar caracteres especiales!",
                    showConfirmButton:true,
                    confirmButtonText: "Cerrar",
                    closeonConfirm: false
                   
                   }).then((result)=>{

                       if(result.value){
                           window.location= "proveedores";
                       }
                   });
                </script>';
        }
            
            
            


      }
  }

}

     /*--======================================================
        MOSTRAR PROVEEDORES
  =========================================================--  */

static public function crtMostrarProveedores($item,$valor){
    $tabla='proveedores';
    $respuesta= ModelosProveedores::mdlMostrarProveedores($tabla,$item,$valor);
    return $respuesta;
}
 /*--======================================================
        EDITAR PROVEEDORES
  =========================================================--  */
  static public function ctrEditarProveedores(){
    if(isset($_POST["editarNombre"])){

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRazonSocial"])&&
      preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST['editarNombre'])&&
      preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST['editarApellido'])){
        $tabla1="personas";
        $tabla="proveedores";
        $datos=array(
            "id_persona"=>$_POST['idPersona'],
            "razon_social"=>$_POST['editarRazonSocial'],
            "nombre"=>$_POST['editarNombre'],
            "apellido"=>$_POST['editarApellido'],
            "dni"=>$_POST['editarDNI']
        );
        $respuesta=ModelosProveedores::mdlEditarProveedores($tabla,$tabla1,$datos);

        if($respuesta == "ok"){
            echo'<script>

            swal({
                  type: "success",
                  title: "el proveedor ha sido modificado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "proveedores";

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
                       window.location= "proveedores";
                   }
               });
            </script>';
          


        }


      }
    }
  }
    
}