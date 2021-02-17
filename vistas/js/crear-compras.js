	
/*=============================================
CREAR-COMPRAS
=============================================*/

function editarr(id,nombre,descripcion,codigo,stock,precio_compra){
    // console.log('datos');		
     var idProducto= id;
     $('#btnbtn'+id).hide();
     $('#btnocut'+id).show();
 
     console.log(idProducto);
 
 
  //console.log(idProducto,nombre,descripcion,codigo,stock,precio_venta);
 
 


$('.nuevoProducto').append(

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
                           ' <input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadDeProducto'+idProducto+'"name="nuevaCantidadProducto[]" onchange="restarstock('+idProducto+','+stock+')" stock="'+stock+'" min="1" value=1 max=""  nuevoStock="'+Number(stock+1)+'">'+
                          
                          
          '</div>'+

                          '<!-- precio del producto-->'+
          ' <div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+
                   '<label> Precio </label>'+
                   '<div class="input-group"> '+
                         '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
                         '<input type="text" class="form-control nuevoPrecioProducto" name="nuevoPrecioProducto[]" precioReal="'+precio_compra+'" precioRealFinal="'+precio_compra+'" id="ProductoPrecioVenta'+idProducto+'" value="'+precio_compra+'" readonly required>'+   
                            
                   ' </div>'+
          '</div>'+                
                          
    ' </div>'+
    '<div class="row filas quitarDescuentosyInteres'+idProducto+'"  style="padding:5px 15px">'+
    '<div class="col-xs-6" style="padding-right:0px">'+       
    ' <label> Descuentos </label>'+   
    ' <div class="form-group">'+
       ' <div class="input-group">'+ 
             '<input type="number" class="form-control input-lg descuento_precio" onchange="descuentosPrecios('+idProducto+')" id="ProductoDescuento'+idProducto+'" name="descuentos[]" min="0" value="0">'+
       ' </div> '+
     
   '</div>'+
'</div>'+
 
'<div class="col-xs-3" style="padding-left:0px"  >'+
       
 '<label> Interes </label>'+
'<div class="form-group">'+
    '<div class="input-group">'+ 
          '<input type="number" class="form-control input-lg interes_precio" onchange="AumentoPrecios('+idProducto+')" id="ProductoAumento'+idProducto+'"  name="interess[]" min="0" value="0">'+
    '</div>'+
'</div>'+
'</div>'+

    '</div>')

                         SumartodosLosPrecios()
                         //agregarImpuestos()

                         // AGRUPAR PRODUCTOS EN FORMATO JSON

                           listarProductos()

                            // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

                              $(".nuevoPrecioProducto");
        

}


/*=============================================
QUITAR PRODUCTO DE LA VENTAR Y RECUPERAR BOTON DE VENTA
=============================================*/

$('.formularioVenta').on("click","button.quitarProducto", function(){
// console.log('button');

$(this).parent().parent().parent().parent().remove();
var idProducto= $(this).attr('idProductoss');
$('.quitarDescuentosyInteres'+idProducto).remove();


// console.log(idProducto);

$('#btnbtn'+idProducto).show();
$('#btnocut'+idProducto).hide();



if($('.filas').length==0){

$("#nuevoImpuestoVenta").val(0)
$('#nuevoTotalVenta').val(0);
$('#TotalVenta').val(0);
$('#nuevoTotalVenta').attr("total",0);
}else{
 SumartodosLosPrecios();

 //agregar Impuestos

// agregarImpuestos()

   // AGRUPAR PRODUCTOS EN FORMATO JSON

   listarProductos()
}




});

/*=============================================
AGREGANDO PRODUCTOS DESDE DISPOSITIVOS
=============================================*/


$('.btnAgregarProductoss').on("click",function(){

});




$("#nuevaCantidadDeProducto").change(function(){



var precio = $(".nuevoPrecioProducto").attr("precioReal");
// console.log(precio);//
var precio_final = Number(($("#nuevaCantidadDeProducto").val()*precio));
$("#nuevaCantidadDeProducto").val(precio_final);



}
);


/*=============================================
MODIFICANDO CANTIDAD Y PRECIO DEL PRODUCTO
=============================================*/


$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){

var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

var PrecioFinal = $(this).val() * precio.attr("precioReal");

precio.val(PrecioFinal);
precio.attr("precioRealFinal", PrecioFinal);

var nuevoStock = Number($(this).attr("stock")) + $(this).val();

$(this).attr("nuevoStock", nuevoStock);

if(Number($(this).val()) > Number($(this).attr('stock')) );





var PrecioFinal=$(this).val()*precio.attr("precioReal");
precio.val(PrecioFinal);
SumartodosLosPrecios()

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

SumartodosLosPrecios()

listarProductos()

//agregar Impuestos

// agregarImpuestos()



});

/*=============================================
SUMA DE TODOS LOS PRECIOS
=============================================*/

function SumartodosLosPrecios(){
var PrecioItem= $(".nuevoPrecioProducto");
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

$('#nuevoTotalVenta').val(sumatotalPrecio);
$('#TotalVenta').val(sumatotalPrecio);
$('#nuevoTotalVenta').attr("total",sumatotalPrecio);

}





/*=============================================
CUANDO CAMBIA EL IMPUESTO
=============================================*/

$("#nuevoImpuestoVenta").change(function(){



});

/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/

$("#nuevoTotalVenta");


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
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

var efectivo = $(this).val();

var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

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

var precio = $(".nuevoPrecioProducto");

var descuento = $(".descuento_precio");

var interes= $(".interes_precio");

for(var i = 0; i < descripcion.length; i++){

listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 
               "descripcion" : $(descripcion[i]).val(),
               "interes": $(interes[i]).val(),
               "descuento": $(descuento[i]).val(),
                      "cantidad" : $(cantidad[i]).val(),
                      "stock" : $(cantidad[i]).attr("nuevoStock"),
                      "precio" : $(precio[i]).attr("precioReal"),
                      "total" : $(precio[i]).val()})

}

console.log("listarProductos",listaProductos);
$("#listarProductos").val(JSON.stringify(listaProductos)); 

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
=============================================*/
$("#idtipofactura").change(insertarImpuesto);

var impuestos=$('#nuevoImpuestoVenta');
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
=============================================*/
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
