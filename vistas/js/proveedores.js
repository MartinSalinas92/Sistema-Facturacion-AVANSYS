  /*=============================================
EDITAR PROVEEDORES
=============================================*/

$(".btnEditarProveedores").click(function(){

    var idProveedores=$(this).attr("idProveedores");

    
    var datos= new FormData();
    datos.append("idProveedores",idProveedores);

    console.log('valor ='+ idProveedores);

    $.ajax({
        url:"ajax/proveedores.ajax.php?op=editar&id_user="+idProveedores,
            method:'POST',
           cache:false,
           data:datos,
           contenttype:false,
           processData:false,
           Datatype:"json",
           success: function(respuesta){  
                  
            var respuesta = JSON.parse(respuesta);
        console.log(respuesta); 
        
           $("#idProveedores").val(respuesta['id_proveedor']);
            $("#editarRazonSocial").val(respuesta['razon_social']);
            
           
           }


    });


});

/*=============================================
ACTIVAR CATEGORIA
=============================================*/

 
$(document).on("click", ".btnActivar", function(){


    var idProveedor = $(this).attr("idProveedores");
    var estadoProveedor = $(this).attr("estadoProveedor");
    //solicitar que ajax haga la modificacion en la base de datos

    var datos = new FormData();
     datos.append("activarId", idProveedor);
      datos.append("activarProveedor", estadoProveedor);

     $.ajax({
        url:'ajax/proveedores.ajax.php?op=activar&id_user='+idProveedor+'&estado='+estadoProveedor,
         method:"POST",
         data:datos,
         cache:false,
         contenttype:false,
         processData:false,
         success:function(respuesta){
        

         }


     })
     if(estadoProveedor==0){
         $(this).removeClass('btn-success');
         $(this).addClass('btn-danger');
         $(this).html('desactivado');
         $(this).attr('estadoProveedor',1);
     }else{
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('activado');
        $(this).attr('estadoProveedor',0);

     }
 });