<?php

class  ControladorUsuarios{

    /*--======================================================
        INGRESO DEL USUARIO
  =========================================================--  */

  static public function ctrIngresoUsuario(){
    if(isset($_POST['ingUsuario'])){
        if( preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])&&
         preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
 
  
             
            $tabla='usuarios';
           $item='usuario';
           $valor=$_POST['ingUsuario'];

           $respuesta=ModelosUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);
           //var_dump($respuesta['usuario']);//
           if($respuesta["usuario"]==$_POST["ingUsuario"]){
           // if(password_verify($_POST["ingPassword"],$respuesta["password"])){

                   if($respuesta['estado']==1){

                   $_SESSION["iniciarSesion"] = "ok";
                   $_SESSION["id_usuario"] = $respuesta["id_usuario"];
                   $_SESSION["nombre"] = $respuesta["nombre"];
                   $_SESSION["usuario"] = $respuesta["usuario"];
                   $_SESSION["perfil"] = $respuesta["perfil"];
                   $_SESSION["foto"] = $respuesta["foto"];
                   

                   
           /*--======================================================
               REGISTAR ULTIMO LOGIN
        =========================================================--  */

                   date_default_timezone_set('America/Argentina/Formosa');

                       $fecha= date('Y-m-d');
                       $hora= date('H:i:s');

                       $fechaActual= $fecha. " " .$hora;

                       $item1='ultimo_login';
                       $valor1= $fechaActual;

                       $item2="id_usuario";
                       $valor2=$respuesta['id_usuario'];

                       $ultimoLogin= ModelosUsuarios::activarUsuarios($tabla,$item1,$valor1,$item2,$valor2);

                       if($ultimoLogin=="ok"){

                           echo '<script> 
                           window.location = "inicio";
                           </script>';
                       }

                   
                    }else{
               echo'<br><div class= "alert alert-danger"> El usuario aun no esta activado </div>';
           }

               
           
       }else{
               echo'<br><div class= "alert alert-danger"> Error al Ingresar, intentelo nuevamente </div>';
           }
         }
     }
   }



 /*--======================================================
        CREAR USUARIOS
  =========================================================--  */

  static public function ctrCrearUsuario(){
      if(isset($_POST['nuevoNombre'])){
          /*validamos los campos*/
          if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
					 preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
					 preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                         /*=============================================
					VALIDAR IMAGEN
					=============================================*/

                            $ruta="";

                            if(isset($_FILES["nuevaFoto"]["tmp_name"])){
                                list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                                $nuevoAlto=500;
                                $nuevoAncho=500;
                            
                            /*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                        =============================================*/
                        $directorio="vistas/img/usuarios/".$_POST['nuevoUsuario'];
                        mkdir($directorio,0755);
                        
						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                        =============================================*/
                        if($_FILES["nuevaFoto"]["type"]=="image/jpeg"){
                        /*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO JPEG
                            =============================================*/
                            $aleatorio=mt_rand(100,999);
                            $ruta="vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
                            $origen=imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta);

                        }
                        if($_FILES["nuevaFoto"]["type"]=="image/png"){
                        /*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO PNG
                            =============================================*/
                            $aleatorio=mt_rand(100,999);
                            $ruta="vistas/img/usuarios/".$_POST['nuevoUsuario']."/".$aleatorio.".png";
                            $origen=imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino,$ruta);
                        }

                    }





                            $tabla="usuarios";
                            $encriptar=password_hash($_POST["nuevoPassword"],PASSWORD_BCRYPT);

                            $datos=array(
                                "nombre"=>$_POST["nuevoNombre"],
                                "usuario"=>$_POST["nuevoUsuario"],
                                "password"=>$encriptar,
                                "perfil"=>$_POST["nuevoPerfil"],
                                "foto"=>$ruta );
                        $respuesta=ModelosUsuarios::mdlGuardarUsuarios($tabla,$datos);

                        if($respuesta=="ok"){
                            echo '<script> 

                            swal({
                                type: "success",
                                title: "¡EL usuario ha sido guardado correctamente!",
                                showConfirmButton:true,
                                confirmButtonText: "Cerrar",
                                closeonConfirm: false
                               
                               }).then((result)=>{
   
                                   if(result.value){
                                       window.location= "usuarios";
                                   }
                               });
                            </script>';
                        }

                     }else{
                         echo '<script>
                         
                         swal({
                             type: "error",
                             title: "¡EL usuario no puede ir vacio o llevar caracteres especiales!",
                             showConfirmButton:true,
                             confirmButtonText: "Cerrar",
                             closeonConfirm: false
                            
                            }).then((result)=>{

                                if(result.value){
                                    window.location= "usuarios";
                                }
                            });
                         </script>';
                     }

      }
  }

  
    /*--======================================================
        MOSTRAR USUARIOS
  =========================================================--  */

  static public function mostrarUsuarios($item,$valor){
      $tabla="usuarios";
      $respuesta=ModelosUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);
      return $respuesta;
  }

   /*--======================================================
        EDITAR USUARIOS
  =========================================================--  */
  static public function ctrEditarUsuario(){
      if(isset($_POST["editarUsuario"])){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

             /*--======================================================
                VALIDAR IMAGEN
             =========================================================--  */

             $ruta=$_POST['fotoActual'];
             //var_dump($ruta);

             if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){
                list($ancho,$alto)=getimagesize($_FILES["editarFoto"]["tmp_name"]);
                $nuevoAlto=500;
                $nuevoAncho=500;
            
            /*=============================================
        CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
        =============================================*/
        $directorio="vistas/img/usuarios/".$_POST['editarUsuario'];
             /*=============================================
        PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BASE DE DATOS
        =============================================*/
        if(!empty($_POST['fotoActual'])){
            unlink($_POST['fotoActual']);

        }else{
            mkdir($directorio,0755);

        }

       
        
        /*=============================================
        DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
        =============================================*/
        if($_FILES["editarFoto"]["type"]=="image/jpeg"){
        /*=============================================
            GUARDAMOS LA IMAGEN EN EL DIRECTORIO JPEG
            =============================================*/
            $aleatorio=mt_rand(100,999);
            $ruta="vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
            $origen=imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);

        }
        if($_FILES["editarFoto"]["type"]=="image/png"){
        /*=============================================
            GUARDAMOS LA IMAGEN EN EL DIRECTORIO PNG
            =============================================*/
            $aleatorio=mt_rand(100,999);
            $ruta="vistas/img/usuarios/".$_POST['editarUsuario']."/".$aleatorio.".png";
            $origen=imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
            $destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino,$ruta);
        }

    }

        $tabla="usuarios";

        if($_POST['passwordActual'] != ""){
            if(	preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordActual"])){
                $encriptar=password_hash($_POST["passwordActual"],PASSWORD_BCRYPT);


            }else{
                echo '<script>
                         
                         swal({
                             type: "error",
                             title: "¡La contraseña no puede ir vacio o llevar caracteres especiales!",
                             showConfirmButton:true,
                             confirmButtonText: "Cerrar",
                             closeonConfirm: false
                            
                            }).then((result)=>{

                                if(result.value){
                                    window.location= "usuarios";
                                }
                            });
                         </script>';
            }
        }else{

            /*si la persona no quiere encriptar la contraseña*/  
            $encriptar=$passwordActual;          
        }
        /*mandamos los datos al modelo*/

        $datos=array(
            "nombre"=>$_POST["editarNombre"],
            "usuario"=>$_POST["editarUsuario"],
            "password"=>$encriptar,
            "perfil"=>$_POST["editarPerfil"],
            "foto"=>$ruta );
    $respuesta=ModelosUsuarios::mdlEditarUsuarios($tabla,$datos);

     if($respuesta=='ok'){

        echo '<script> 

        swal({
            type: "success",
            title: "¡EL usuario ha sido modificado correctamente!",
            showConfirmButton:true,
            confirmButtonText: "Cerrar",
            closeonConfirm: false
           
           }).then((result)=>{

               if(result.value){
                   window.location= "usuarios";
               }
           });
        </script>';

     }







        }

      }
  }
      /*=============================================
        ELIMINAR USUARIOS
        =============================================*/
        
	static public function BorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];


			$respuesta = ModelosUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}

}