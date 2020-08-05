<?php


class ControladorClientes{

    static function ctrCrearClientes(){
        if(isset($_POST['nuevoNombre'])){
            
                $tabla="clientes";
                $tabla1='personas';
                $tabla2="direccion";

                $datos= array(
                  
                    'nombre'=>$_POST['nuevoNombre'],
                    'apellido'=>$_POST['nuevoApellido'],
                    'dni'=>$_POST['nuevoDNI'],
                    'localidad'=>$_POST['nuevaLocalidad'],
                    'direccion'=> $_POST['nuevaDireccion'],
                    'nombre_calle'=>$_POST['nuevaCalle'],
                    'numero_calle'=>$_POST['numerodeCalle'],
                    'numero_casa'=>$_POST['numerodeCasa'],
                    'piso_departamento'=>$_POST['nuevoDepartamento']
                );
                var_dump($datos);

                $respuesta=ModeloClientes::mdlInsertarClientes($tabla,$tabla1,$tabla2,$datos);
                
        if($respuesta== 'ok'){
            echo'
            <script>
            swal({
                type: "success",
                title: "¡El cliente ha sido guardado correctamente!",
                showConfirmButton:true,
                confirmButtonText: "Cerrar",
                closeonConfirm: false
               
               }).then((result)=>{

                   if(result.value){
                       window.location= "clientes";
                   }
               });
            </script>';
        }else{
            echo '<script>
            console.log('.$respuesta[1].')

           
                         
                swal({
                    type: "error",
                    title: "¡EL cliente no puede ir vacio o llevar caracteres especiales!",
                    showConfirmButton:true,
                    confirmButtonText: "Cerrar",
                    closeonConfirm: false
                   
                   }).then((result)=>{

                       if(result.value){
                           window.location= "clientes";
                       }
                   });
                </script>';
        }

            
        }
        
    }
    static function ctrCrearClientesVentas(){
        if(isset($_POST['nuevoNombre'])){
            if( preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoNombre"])&&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoApellido"])){

                $tabla="clientes";
                $tabla1='personas';
                $tabla2="direccion";

                $datos= array(
                  
                    'nombre'=>$_POST['nuevoNombre'],
                    'apellido'=>$_POST['nuevoApellido'],
                    'dni'=>$_POST['nuevoDNI'],
                    'localidad'=>$_POST['nuevaLocalidad'],
                    'direccion'=> $_POST['nuevaDireccion'],
                    'nombre_calle'=>$_POST['nuevaCalle'],
                    'numero_calle'=>$_POST['numerodeCalle'],
                    'numero_casa'=>$_POST['numerodeCasa'],
                    'piso_departamento'=>$_POST['nuevoDepartamento']
                );
                var_dump($datos);

                $respuesta=ModeloClientes::mdlInsertarClientes($tabla,$tabla1,$tabla2,$datos);
                
        if($respuesta== 'ok'){
            echo'
            <script>
            swal({
                type: "success",
                title: "¡El cliente ha sido guardado correctamente!",
                showConfirmButton:true,
                confirmButtonText: "Cerrar",
                closeonConfirm: false
               
               }).then((result)=>{

                   if(result.value){
                       window.location= "crear-ventas";
                   }
               });
            </script>';
        }else{
            echo '<script>
            console.log('.$respuesta[1].')

           
                         
                swal({
                    type: "error",
                    title: "¡EL cliente no puede ir vacio o llevar caracteres especiales!",
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
        
    }

  static public function ctrMostrarClientes($item,$valor){
      $tabla="clientes";
      $respuesta=ModeloClientes::mdlMostrarClientes($item,$valor,$tabla);
      return $respuesta;
  }

  static public function crtEditarClientes(){
    if(isset($_POST['EditarNombre'])){
        

           
            $tabla1='personas';
            $tabla2="direccion";

            $datos= array(
                'id_persona'=>$_POST['idCLiente'],
                'nombre'=>$_POST['EditarNombre'],
                'apellido'=>$_POST['editarApellido'],
                'dni'=>$_POST['EditarDNI'],
                'id_direccion'=>$_POST['idDireccion'],
                'localidad'=>$_POST['EditarLocalidad'],
                'direccion'=> $_POST['EditarDireccion'],
                'nombre_calle'=>$_POST['EditarCalle'],
                'numero_calle'=>$_POST['editarnumerodeCalle'],
                'numero_casa'=>$_POST['editarnumerodeCasa'],
                'piso_departamento'=>$_POST['EditarnuevoDepartamento']
            );

            $respuesta=ModeloClientes::mdlEditarClientes($tabla1,$tabla2,$datos);
            
    if($respuesta == 'ok'){
        echo'
        <script>
     
        swal({
            type: "success",
            title: "¡El cliente ha sido modificado correctamente!",
            showConfirmButton:true,
            confirmButtonText: "Cerrar",
            closeonConfirm: false
           
           }).then((result)=>{

               if(result.value){
                   window.location= "clientes";
               }
           });
        </script>';
    }else{
        echo '<script>
        console.log('.$respuesta.');

       
                     
            swal({
                type: "error",
                title: "¡Ocurrio un problema el cliente no se ha podido modificar!",
                showConfirmButton:true,
                confirmButtonText: "Cerrar",
                closeonConfirm: false
               
               }).then((result)=>{

                   if(result.value){
                       window.location= "clientes";
                   }
               });
            </script>';
    }

        
    }
    
}

  }
