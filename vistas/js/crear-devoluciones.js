/*=============================================
CREAR-DEVOLUCIONES
=============================================*/
	

function editpdevoluciones(id,descripcion,cantidad){
    // console.log('datos');		
     var idProducto= id;
     $('#btnbtndev'+id).hide();
     $('#btnocutdev'+id).show();
 
     console.log(idProducto);


     $('.nuevoProductoDevolucion').append(

        '<!--  descripcion del producto-->',
        
          '<div class="row" style="padding:5px 15px">'+

              ' <div class="col-xs-6" style="padding-right:0px">'+
                       '<label> Descripcion </label>'+
                       '<div class="input-group">'+
                          '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" name="idProducto[]" idProductoss="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+
                          '<input type="hidden" id="'+idProducto+'" value="'+idProducto+'" name="idProductos[]">'+
                          '<input type="text" class="form-control nuevaDescripcionProducto " id="agregarProducto"   idProducto="'+idProducto+'"name="agregarProducto[]"  value="'+descripcion+'" readonly>'+   
                              
                       '</div>'+
              ' </div>'+

     
              '<div class="col-xs-3">'+
                                '<label>Cantidad </label>'+
                               ' <input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadDeProducto'+idProducto+'"name="nuevaCantidadProducto[]" stock="'+cantidad+'" min="1" value="'+cantidad+'" max="'+cantidad+'"  nuevoCantidad="'+Number(cantidad-1)+'">'+
                              
                              
              '</div>'+
              '</div>'+
              '</div>')

              listarProductos();

              
}



/*=============================================
QUITAR PRODUCTO DE LA VENTAR Y RECUPERAR BOTON DE VENTA
=============================================*/

$('.formularioVentaDevoluciones').on("click","button.quitarProducto", function(){
    // console.log('button');
  
     $(this).parent().parent().parent().parent().remove();
     var idProducto= $(this).attr('idProductoss');


     
   $('#btnbtndev'+idProducto).show();
   $('#btnocutdev'+idProducto).hide();

   listarProductos();

    });



    /*=============================================
MODIFICANDO CANTIDAD Y PRECIO DEL PRODUCTO
=============================================*/


$(".formularioVentaDevoluciones").on("change", "input.nuevaCantidadProducto", function(){

  var nuevoStock = Number($(this).attr("stock")) - $(this).val();

  $(this).attr("nuevoCantidad", nuevoStock);

  listarProductos();


});







/*=============================================
LISTAR PRODUCTOS
=============================================*/


function listarProductos(){
  var listarProductos=[];

  var descripcion= $(".nuevaDescripcionProducto");

  var cantidad = $(".nuevaCantidadProducto");

  
	for(var i = 0; i < descripcion.length; i++){

		listarProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 
							  "descripcion" : $(descripcion[i]).val(),
							  "cantidad" : $(cantidad[i]).val()
							  
							  })

	}
    console.log('listarProductosD',listarProductos);
	$("#listarProductosD").val(JSON.stringify(listarProductos)); 

}

 /*=============================================
MOSTRAR LOS DETALLES
=============================================*/

$('.btnImprimirDevolucion').click(function(){

    var idDevolucion=$(this).attr("idDevolucion");

    window.location="index.php?ruta=detalledevolucioness&idDevolucion="+idDevolucion;

   

});


