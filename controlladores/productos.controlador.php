<?php

class ControladorProductos{

    public function mostrarUltimoCode(){
        $respuesta=modeloproductos::UlitmoCode();
        return $respuesta;
    }
    static public function ctrCrearProductos(){
        if (isset($_POST['nuevoNombreProducto'])){



                /*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = "vistas/img/productos/anonymous.png";

			   	if(isset($_FILES["nuevaImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}


                $tabla="productos";

                $datos= array(

                    'nombre'=> $_POST['nuevoNombreProducto'],
                    'imagen'=>$ruta,
                    'descripcion'=> $_POST['nuevaDescripcion'],
                    'codigo'=> $_POST['nuevoCodigo'],
                    'precio_venta'=>$_POST['nuevaPrecioVenta'],
                    'precio_compra'=>$_POST['nuevaPrecioCompra'],
                    'stock'=>$_POST['nuevaStock'],
                    'stock_min'=>$_POST['nuevaStock_min'],
                    'marca_id'=>$_POST['nuevoMarca'],
                    'categoria_id'=>$_POST['nuevoCategoria']
                   



                );
                

                $respuesta=modeloProductos::crearProductos($tabla,$datos);
        
                if($respuesta =='ok'){
                    echo'
                    <script>
                    swal({
                        type: "success",
                        title: "¡El producto ha sido guardado correctamente!",
                        showConfirmButton:true,
                        confirmButtonText: "Cerrar",
                        closeonConfirm: false
                       
                       }).then((result)=>{
        
                           if(result.value){
                               window.location= "productos";
                           }
                       });
                    </script>';


                    }else{
                        echo '<script>
                            console.log('.$respuesta[1].')     
                            swal({
                                type: "error",
                                title: "¡EL producto  no puede ir vacio o llevar caracteres especiales!",
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

        static public function ctrMostrarProductos($item,$valor){
            $tabla='productos';
            $respuesta=modeloProductos::mdlmostrarProductos($tabla,$item,$valor);
            return $respuesta;


        }
        static public function ctrMostrarProductosMayorVentas($item,$precio_venta){
            $tabla='productos';
            $respuesta=modeloProductos::mdlMostrasProductosMasVendidos($tabla,$item,$precio_venta);
            return $respuesta;
        }
        static public function ctrEditarProductos(){
            if (isset($_POST['EditarNombreProducto'])){
    
                    /*=============================================
                    VALIDAR IMAGEN
                    =============================================*/
                        
                       $ruta = $_POST['fotoActual'];
    
                       if(isset($_FILES["editarImagen"]["tmp_name"])&& !empty($_FILES["editarImagen"]["tmp_name"])){
    
                        list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
    
                        $nuevoAncho = 500;
                        $nuevoAlto = 500;
    
                        /*=============================================
                        CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                        =============================================*/
    
                        $directorio = "vistas/img/productos/".$_POST["EditarCodigo"];
    
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
    
                        if($_FILES["editarImagen"]["type"] == "image/jpeg"){
    
                            /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/
    
                            $aleatorio = mt_rand(100,999);
    
                            $ruta = "vistas/img/productos/".$_POST["EditarCodigo"]."/".$aleatorio.".jpg";
    
                            $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						
    
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                            imagejpeg($destino, $ruta);
    
                        }
    
                        if($_FILES["editarImagen"]["type"] == "image/png"){
    
                            /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/
    
                            $aleatorio = mt_rand(100,999);
    
                            $ruta = "vistas/img/productos/".$_POST["EditarCodigo"]."/".$aleatorio.".png";
    
                            $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						
    
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                            imagepng($destino, $ruta);
    
                        }
    
                    }
    
    
                    $tabla="productos";
    
                    $datos= array(
    
                        'nombre'=> $_POST['EditarNombreProducto'],
                        'imagen'=>$ruta,
                        'descripcion'=> $_POST['EditarDescripcion'],
                        'codigo'=> $_POST['EditarCodigo'],
                        'precio_venta'=>$_POST['EditarPrecioVenta'],
                        'precio_compra'=>$_POST['EditarPrecioCompra'],
                        'stock'=>$_POST['editarStock'],
                        'marca_id'=>$_POST['EditarMarca'],
                        'categoria_id'=>$_POST['EditarCategoria'],
                        'id_producto'=>$_POST['idProductos'],
    
    
    
                    );
                    
    
                    $respuesta=modeloProductos::editarProductos($tabla,$datos);
                        echo '<script> 
                        
                        
                        </script>';
                    if($respuesta =='ok'){
                        echo'
                        <script>
                        
                        swal({
                            type: "success",
                            title: "¡El producto ha sido modificado correctamente!",
                            showConfirmButton:true,
                            confirmButtonText: "Cerrar",
                            closeonConfirm: false
                           
                           }).then((result)=>{
            
                               if(result.value){
                                   window.location= "productos";
                               }
                           });
                        </script>';
    
    
                        }else{
                            echo '<script>
                                console.log('.$respuesta[1].')     
                                swal({
                                    type: "error",
                                    title: "¡EL producto  no puedo ser modificado!",
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
    
                static public function ctrActualizarProductosCategoria(){
                    if(isset($_POST["actualizarPrecioCategoria"])){
				

                        $tabla = "productos";
        
                        $porcentaje = $_POST["actualizaPorCategoria"];
        
                        $categoria = $_POST["actualizarPrecioCategoria"];

                        
        
                        $respuesta = ModeloProductos::mdlActualizaProductoCategoria($tabla, $porcentaje, $categoria);
        
                        if($respuesta == "ok"){
        
                            echo'<script>
        
                                swal({
                                      type: "success",
                                      title: "El precio ha sido editado correctamente",
                                      showConfirmButton: true,
                                      confirmButtonText: "Cerrar"
                                      }).then((result) => {
                                                if (result.value) {
        
                                                window.location = "productos";
        
                                                }
                                            })
        
                                </script>';
        
                        }else{
                            echo '<script>
                                     
                                swal({
                                    type: "error",
                                    title: "¡EL producto  no puedo ser modificado!",
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

                /*=============================================
					ACTUALIZAR POR MARCA
					=============================================*/

                    static public function ctrActualizarProductosSubCategoria(){
                        if(isset($_POST["ActualizarMarca"])){
                    
    
                            $tabla = "productos";
            
                            $porcentaje = $_POST["porcentajeSub"];
            
                            $marca = $_POST["ActualizarMarca"];
            
                            $respuesta = ModeloProductos::mdlActualizaProductoSubCategoria($tabla, $porcentaje, $marca);
            
                            if($respuesta == "ok"){
            
                                echo'<script>
            
                                    swal({
                                          type: "success",
                                          title: "El precio ha sido editado correctamente '.$marca.' ",
                                          showConfirmButton: true,
                                          confirmButtonText: "Cerrar"
                                          }).then((result) => {
                                                    if (result.value) {
            
                                                    window.location = "productos";
            
                                                    }
                                                })
            
                                    </script>';
            
                            }
            
            
                        }
                    }
                
            
    
                    
    
    
        

         
        }
    
