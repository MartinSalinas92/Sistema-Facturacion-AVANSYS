	
/*=============================================
CREAR-COMPRAS
=============================================*/

function editarr(id,descripcion,stock,precio_compra,precio_venta){
    // console.log('datos');		
     var idProducto= id;

     $('#btnbtn'+id).hide();
     $('#btnocut'+id).show();
 
     console.log(idProducto);

 
 
  //console.log(idProducto,nombre,descripcion,codigo,stock,precio_venta);
 
 


$('.nuevoProductoCompra').append(

    '<!--  descripcion del producto-->',
    
      '<div class="row productosCompras" style="padding:5px 15px">'+

          ' <div class="col-xs-6" style="padding-right:0px">'+
                   '<label> Descripcion </label>'+
                   '<div class="input-group">'+
                      '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" name="idProducto[]" idProductoss="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+
                      '<input type="hidden" id="'+idProducto+'" value="'+idProducto+'" name="idProductos[]">'+
                      '<input type="text" class="form-control nuevaDescripcionProducto " id="agregarProducto"   idProducto="'+idProducto+'"name="agregarProducto[]"  value="'+descripcion+'" readonly>'+   
                          
                   '</div>'+
          ' </div>'+
          '<!-- precio del producto compra-->'+
          ' <div class="col-xs-3 ingresoPrecioUnitario" style="padding-left:0px">'+
                   '<label> Precio_compra</label>'+
                   '<div class="input-group"> '+
                         '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
                         '<input type="text" class="form-control nuevoPrecioProductoCompras" name="nuevoPrecioProducto[]" precioReal="'+precio_compra+'" precioRealFinal="'+precio_compra+'" id="ProductoPrecioVenta'+idProducto+'" value=""  required>'+   
                            
                   ' </div>'+
          '</div>'+  
 
          '<div class="col-xs-3">'+
                            '<label>Cantidad </label>'+
                           ' <input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadDeProducto'+idProducto+'" name="nuevaCantidadProducto[]" onchange="restarstock('+idProducto+','+stock+')" stock="'+stock+'" min="1" value=1 max=""  nuevoStock="'+Number(stock+1)+'">'+
                          
                          
          '</div>'+

           
          '<!-- Precio del producto -->'+

	          '<div class="col-xs-6 ingresoPrecioCompra" style="padding-left:0px">'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	                 
	              '<input type="text" class="form-control nuevoPrecioProductoCompra" name="nuevoPrecioProductoCompra" placeholder ="Total" value="" required>'+
	 
	            '</div>'+
	             
	          '</div>'+
              
                        
                          
    ' </div>'
    )
  

                         SumartodosLosPrecios()
                         //agregarImpuestos()

                         // AGRUPAR PRODUCTOS EN FORMATO JSO

                           listarProductos()

                          
                              

}


/*=============================================
QUITAR PRODUCTO DE LA VENTAR Y RECUPERAR BOTON DE VENTA
=============================================*/

$('.formularioCompra').on("click","button.quitarProducto", function(){
// console.log('button');

$(this).parent().parent().parent().parent().remove();
var idProducto= $(this).attr('idProductoss');
$('.quitarDescuentosyInteres'+idProducto).remove();


// console.log(idProducto);

$('#btnbtn'+idProducto).show();
$('#btnocut'+idProducto).hide();



if($('.filas').length==0){

$("#nuevoImpuestoCompra").val(0)
$('#nuevoTotalCompra').val(0);
$('#TotalCompra').val(0);
$('#nuevoTotalCompra').attr("total",0);
}else{
 SumartodosLosPrecios();

 //agregar Impuestos

// agregarImpuestos()

   // AGRUPAR PRODUCTOS EN FORMATO JSON

   listarProductos()
 
}




});






$("#nuevoTotalCompra").change(function(){

  var precio = $(".nuevoPrecioProductoCompra").val();
// console.log(precio);//
var precio_final = Number(($("#nuevaCantidadProducto").val()*precio));
$("#nuevoTotalCompra").val(precio_final);


});


/*=============================================
MODIFICANDO CANTIDAD Y PRECIO DEL PRODUCTO
=============================================*/



$(".formularioCompra").on("change", "input.nuevaCantidadProducto", function(){
  
	var precioCompra = $(this).parent().parent().children(".ingresoPrecioUnitario").children().children(".nuevoPrecioProductoCompras");

  
	var precioFinalCompra = $(this).val() * precioCompra.val();

	var precioTotalCompra = $(this).parent().parent().children(".ingresoPrecioCompra").children().children(".nuevoPrecioProductoCompra");
	
	precioTotalCompra.val(precioFinalCompra);
  



var nuevoStock = Number($(this).attr("stock")) + Number($(this).val());

$(this).attr("nuevoStock", nuevoStock);




SumartodosLosPrecios();



listarProductos()

/*swal({
 title:"la cantidad supera el stock",
 text: "solo hay " +$(this).attr('stock')+ "unidades",
 type:'error',
 confirmButtonText:'cerrar'
});

return;

}*/
//SUMA TOTAL PRECIOS



//agregar Impuestos

// agregarImpuestos()



});

/*=============================================
SUMA DE TODOS LOS PRECIOS
=============================================*/

function SumartodosLosPrecios(){
var PrecioItem= $(".nuevoPrecioProductoCompra");
var PreciosumaArraY= [];

for(var i=0;i< PrecioItem.length; i++) {
 PreciosumaArraY.push(Number($(PrecioItem[i]).val()))

//console.log('PreciosumaArraY', PreciosumaArraY);


}
function SumarPrecio(total,numero){

return total + numero;



}
var sumatotalPrecio=PreciosumaArraY.reduce(SumarPrecio);
//console.log('sumatotalPrecio', sumatotalPrecio);

$('#nuevoTotalCompra').val(sumatotalPrecio);
$('#TotalCompra').val(sumatotalPrecio);
$("#nuevoTotalCompra").val(precio_final);
$('#nuevoTotalCompra').attr("total",sumatotalPrecio);

}





/*=============================================
CUANDO CAMBIA EL IMPUESTO
=============================================

$("#nuevoImpuestoCompra").change(function(){



});

/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/

$("#nuevoTotalCompra");


/*=============================================
SELECCIONAR MÉTODO DE PAGO
=============================================*/


$("#nuevoMetodoPago").change(function(){

var metodo = $(this).val();

if(metodo == "Efectivo"){

$(this).parent().parent().removeClass("col-xs-6");

$(this).parent().parent().addClass("col-xs-4");

$(this).parent().parent().parent().children(".cajasMetodoPago").html(

  '<div class="col-xs-4">'+ 
  
    '<label> Pago </label>'+

         '<div class="input-group">'+ 

             '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+ 

             '<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>'+

         '</div>'+

     '</div>'+

  '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+
  
  
  '<label> Cambio </label>'+

         '<div class="input-group">'+

             '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

             '<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>'+

         '</div>'+

     '</div>'

)

// Agregar formato al precio

// $('#nuevoValorEfectivo').number( true, 2);
// $('#nuevoCambioEfectivo').number( true, 2);


// Listar método en la entrada
// listarMetodos()

}else{

$(this).parent().parent().removeClass('col-xs-4');

$(this).parent().parent().addClass('col-xs-6');

$(this).parent().parent().parent().children('.cajasMetodoPago').html(

'<div class="col-xs-6" style="padding-left:0px">'+
             
     '<div class="input-group">'+
          
      
            
       '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+
       
     '</div>'+

   '</div>')

}



});

/*=============================================
CAMBIO EN EFECTIVO
=============================================*/
$(".formularioCompra").on("change", "input#nuevoValorEfectivo", function(){

var efectivo = $(this).val();

var cambio =  Number(efectivo) - Number($('#nuevoTotalCompra').val());

var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

nuevoCambioEfectivo.val(cambio);

})

/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductos(){
var listaProductos = [];

var descripcion = $(".nuevaDescripcionProducto");

var cantidad = $(".nuevaCantidadProducto");

var precio_compra = $(".nuevoPrecioProductoCompras");

var precioTotal = $(".nuevoPrecioProductoCompra");



for(var i = 0; i < descripcion.length; i++){

listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 
               "descripcion" : $(descripcion[i]).val(),
                      "cantidad" : $(cantidad[i]).val(),
                      "stock" : $(cantidad[i]).attr("nuevoStock"),
                      "precio" : $(precio_compra[i]).val(),
                      "total" : $(precioTotal[i]).val()})

}

console.log("listarProductosCompra",listaProductos);
$("#listarProductosCompra").val(JSON.stringify(listaProductos)); 

}

/*=============================================
disminucion del stock
=============================================*/



function restarstock(id,stock){
var resultado = parseInt(stock) + parseInt($("#nuevaCantidadDeProducto"+id).val());
$("#stock"+id).text(resultado);
var text = parseInt($("#stock"+id).text());
console.log(text);
if( text >= '6'){
//verde

$("#stock"+id).removeAttr('class');
$("#stock"+id).attr('class', 'btn btn-success');
}else if(text <= '3'){
//rojo

$("#stock"+id).removeAttr('class');
$("#stock"+id).attr('class','btn btn-danger');
}else{
//amarillo
$("#stock"+id).removeAttr('class');
$("#stock"+id).attr('class','btn btn-warning');
}
listarProductos()
}


/*=============================================
tipo de factura mas impuesto
=============================================
$("#idtipofactura").change(insertarImpuesto);

var impuestos=$('#nuevoImpuestoCompra');
var precioTotal=$("#nuevoTotalVenta").attr("total");

function insertarImpuesto(){
val = $("#idtipofactura").val();
if( val =='A'){
impuestos.val('21');
}else if(val == 'B'){
impuestos.val('18');
}else{
impuestos.val(0);
}

}


/*=============================================
modificar precio total interes y descuentos
=============================================*
// $("#ProductoPrecioVenta").change(descuentosPrecios);



function descuentosPrecios(id){
var precioReal = parseFloat($('#ProductoPrecioVenta'+id).attr('precioRealFinal'));

var descuento = parseInt($("#ProductoDescuento"+id).val());
var precioProducto= parseInt($('#ProductoPrecioVenta'+id).val());
var preciofinal= precioReal - descuento;
console.log(precioReal);
console.log(preciofinal);
$('#ProductoPrecioVenta'+id).val(preciofinal);

SumartodosLosPrecios();

listarProductos();

//agregar Impuestos

//agregarImpuestos()
}

function AumentoPrecios(id){
var precioReal = parseFloat($('#ProductoPrecioVenta'+id).attr('precioRealFinal'));

var aumento = parseInt($("#ProductoAumento"+id).val());
var precioProducto= parseInt($('#ProductoPrecioVenta'+id).val());
var preciofinal= precioReal + aumento;
console.log(precioReal);
console.log(preciofinal);
$('#ProductoPrecioVenta'+id).val(preciofinal);

SumartodosLosPrecios();

listarProductos();

//agregar Impuestos

// agregarImpuestos()
}




/*$("#ProductoPrecioCompra").change(function(){



  var precio = $(".nuevoPrecioProductoVenta").attr("precioRealVentas");
var precio_final = Number(($("#ProductoPrecioCompra").val()*precio));
$("#ProductoPrecioCompra").val(precio_final);

}
)*/
