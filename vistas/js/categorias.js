    /*=============================================
EDITAR CATEGORIA
=============================================*/

$(".btnEditarCategoria").click(function(){

    var idCategoria=$(this).attr("idCategoria");

    var datos= new FormData();
    datos.append("idCategoria",idCategoria);

    console.log(idCategoria);

    $.ajax({
        url:"ajax/categorias.ajax.php?op=editar&id_user="+idCategoria,
            method:'POST',
           cache:false,
           data:datos,
           contenttype:false,
           processData:false,
           Datatype:"json",
           success: function(respuesta){  
                  
            var respuesta = JSON.parse(respuesta);
        console.log(respuesta); 
            $("#idCategoria").val(respuesta.id_categoria);
            $("#editarNombre").val(respuesta.nombre);
           
           }


    });


});

   /*=============================================
ELIMINAR CATEGORIA
=============================================*/

$(".btnEliminarCategoria").click(function(){
    var idCategoria=$(this).attr('idCategoria');

    swal({
        title:"estas seguro de borrar esta categoria ",
        text:"si no puedes cambiar la accion ",
        type:'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoria!'

    }).then(function(result){
        
        if(result.value){
            window.location = "index.php?ruta=categorias&idCategoria="+idCategoria ;
        }

    })
});


   /*=============================================
ACTIVAR CATEGORIA
=============================================*/

 
 $(document).on("click", ".btnActivar", function(){


    var idCategoria = $(this).attr("idCategoria");
    var estadoCategoria = $(this).attr("estadoCategoria");
    //solicitar que ajax haga la modificacion en la base de datos

    var datos = new FormData();
     datos.append("activarId", idCategoria);
      datos.append("activarCategoria", estadoCategoria);

     $.ajax({
        url:'ajax/categorias.ajax.php?op=activar&id_user='+idCategoria+'&estado='+estadoCategoria,
         method:"POST",
         data:datos,
         cache:false,
         contenttype:false,
         processData:false,
         success:function(respuesta){
        

         }


     })
     if(estadoCategoria==0){
         $(this).removeClass('btn-success');
         $(this).addClass('btn-danger');
         $(this).html('desactivado');
         $(this).attr('estadoCategoria',1);
     }else{
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('activado');
        $(this).attr('estadoCategoria',0);

     }
 });