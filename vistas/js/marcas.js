   /*=============================================
EDITAR MARCA
=============================================*/

$(".btnEditarMarca").click(function(){

    var idMarca=$(this).attr("idMarca");

    var datos= new FormData();
    datos.append("idMarca",idMarca);

    //console.log(idCategoria);

    $.ajax({
        url:"ajax/marcas.ajax.php?op=editar&id_user="+idMarca,
            method:'POST',
           cache:false,
           data:datos,
           contenttype:false,
           processData:false,
           Datatype:"json",
           success: function(respuesta){  
                  
            var respuesta = JSON.parse(respuesta);
        console.log(respuesta); 
           $("#idMarca").val(respuesta.id_marca);
            $("#editarMarca").val(respuesta.nombre);
           
           }


    });


});

   
 /*=============================================
ACTIVAR CATEGORIA
=============================================*/

 
$(document).on("click", ".btnActivar", function(){


    var idMarca = $(this).attr("idMarca");
    var estadoMarca = $(this).attr("estadoMarca");
    //solicitar que ajax haga la modificacion en la base de datos

    var datos = new FormData();
     datos.append("activarId", idMarca);
      datos.append("activarMarca", estadoMarca);

     $.ajax({
        url:'ajax/marcas.ajax.php?op=activar&id_user='+idMarca+'&estado='+estadoMarca,
         method:"POST",
         data:datos,
         cache:false,
         contenttype:false,
         processData:false,
         success:function(respuesta){
        

         }


     })
     if(estadoMarca==0){
         $(this).removeClass('btn-success');
         $(this).addClass('btn-danger');
         $(this).html('desactivado');
         $(this).attr('estadoMarca',1);
     }else{
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('activado');
        $(this).attr('estadoMarca',0);

     }
 });