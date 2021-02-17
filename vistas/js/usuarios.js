/*=============================================
	SUBIR FOTOS DEL USUARIO
    =============================================*/
    
    $(".nuevaFoto").change(function(){
        var imagen= this.files[0];

        /*=============================================
	VALIDAMOS EL FORMATO IMAGEN QUE SEA JPG O PNG
    =============================================*/

    if(imagen["type"] !="image/jpeg" && imagen["type"] !="image/png"){

        $(".nuevaFoto"). val("");

        swal({

            type: "error al subir fotos",
            title: "¡La imagen debe estar en formato JPG o PNG!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

        });

    }else if (imagen["size"] >2000000){
        $(".nuevaFoto"). val("");

        swal({

            type: "error",
            title: "¡La imagen no debe pesar mas de 2 MB!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

        });

    }else{
        //FileReader para hacer lectura de archivo
        var datosImagen= new FileReader; /*FileReader hacer lectura de archivo */
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
             var rutaImagen= event.target.result;
             $(".previsualizar").attr("src",rutaImagen);
        });
    }
    
    });

    //editar USUARIO///

    $(".btnEditarUsuario").click(function(){
       var idUsuario= $(this).attr("idUsuario");

       var datos= new FormData();
       datos.append("idUsuario", idUsuario);
       $.ajax({
           url:"ajax/usuarios.ajax.php?op=editar&id_user="+idUsuario,
           cache:false,
           contenttype:false,
           processData:false,
           Datatype:"json",
           success:function(respuesta){
              // console.log('respuesta',respuesta)
               var respuesta = JSON.parse(respuesta);
        console.log(respuesta.nombre);
              $("#editarNombre").val(respuesta.nombre);
               $("#editarUsuario").val(respuesta['usuario']);
               $("#passwordActual").val(respuesta['password']);
               $("#editarPerfil").html(respuesta['perfil']);
               $("#editarPerfil").val(respuesta['perfil']);
               $('#fotoActual').val(respuesta['foto']);
              

               if(respuesta['foto'] !=""){
                   $(".previsualizar").attr("src",respuesta['foto']);

               }
           }
       }); 
    });

     //ACTIVAR USUARIO///
     $(document).on("click", ".btnActivar", function(){

        var idUsuario = $(this).attr("idUsuario");
        var estadoUsuario = $(this).attr("estadoUsuario");
        //solicitar que ajax haga la modificacion en la base de datos
    
        var datos = new FormData();
         datos.append("activarId", idUsuario);
          datos.append("activarUsuario", estadoUsuario);
    
         $.ajax({
            url:'ajax/usuarios.ajax.php?op=activar&id_user='+idUsuario+'&estado='+estadoUsuario,
             method:"POST",
             data:datos,
             cache:false,
             contenttype:false,
             processData:false,
             success:function(respuesta){


             }


         })
         if(estadoUsuario==0){
             $(this).removeClass('btn-success');
             $(this).addClass('btn-danger');
             $(this).html('desactivado');
             $(this).attr('estadoUsuario',1);
         }else{
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-success');
            $(this).html('activado');
            $(this).attr('estadoUsuario',0);

         }
     });

     /*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php?op=validar&validarUsuario="+usuario,
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

    })
    
});

     /*=============================================
ELIMINAR USUARIO
=============================================*/
$(".btnEliminarUsuario").click(function(){

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");

    swal({
        title:'Estas seguro de borrar el usuario',
        text:'si no lo esta puede cambiar la accion',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function(result){

        if(result.value){
    
          window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
    
        }
    
      })
});
     
