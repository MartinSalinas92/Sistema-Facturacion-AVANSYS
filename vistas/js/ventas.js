/*=============================================
IMPRIMIR FACTURA
=============================================*/
$('.tablas').on('click',".btnImprimirFactura", function(){

    var codigoVenta= $(this).attr("codigo_venta");
 
    window.open("extensiones/tcpdf/pdf/factura.php?id_user="+codigoVenta, "_blank");
 
 });


 /*=============================================
RANGO DE FECHAS
=============================================*/

$('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Hoy'       : [moment(), moment()],
        'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
        'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
        'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment(),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  
      var fechaInicial = start.format('YYYY-MM-DD');
  
      var fechaFinal = end.format('YYYY-MM-DD');
  
      var capturarRango = $("#daterange-btn span").html();
     
         localStorage.setItem("capturarRango", capturarRango);
  
         window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
  
    }
  
  );

   /*=============================================
VARIABLE LOCALSTORAGE
=============================================*/
if(localStorage.getItem("capturarRango") != null){
  $('#daterange-btn span').html(localStorage.getItem("capturarRango"));
}else{
  $('#daterange-btn span').html('<i class="fa fa-calendar"></i> Rango de Fechas');
}

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "ventas";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){

	var textoHoy = $(this).attr("data-range-key");

	if(textoHoy == "Hoy"){

		var d = new Date();
		
		var dia = d.getDate();
		var mes = d.getMonth()+1;
		var año = d.getFullYear();

		if(mes < 10){

			var fechaInicial = año+"-0"+mes+"-"+dia;
			var fechaFinal = año+"-0"+mes+"-"+dia;

		}else if(dia < 10){

			var fechaInicial = año+"-"+mes+"-0"+dia;
			var fechaFinal = año+"-"+mes+"-0"+dia;

		}else if(mes < 10 && dia < 10){

			var fechaInicial = año+"-0"+mes+"-0"+dia;
			var fechaFinal = año+"-0"+mes+"-0"+dia;

		}else{

			var fechaInicial = año+"-"+mes+"-"+dia;
	    	var fechaFinal = año+"-"+mes+"-"+dia;

		}	

    	localStorage.setItem("capturarRango", "Hoy");

    	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})



/*=============================================
ANULAR VENTAS
=============================================*/
$(document).on("click",".btnActivarFactura", function(){

  var idFactura=$(this).attr("idfactura");
  var estadoFactura=$(this).attr("estadofactura");

  var datos= new FormData();

  datos.append("activarId", idFactura);
  datos.append("activarfactura", estadoFactura);

  $.ajax({
    url:'ajax/ventas.ajax.php?op=activar&id_user='+idFactura+'&estado='+estadoFactura,
     method:"POST",
     data:datos,
     cache:false,
     contenttype:false,
     processData:false,
     success:function(respuesta){
    

     }



})
if(estadoFactura==0){
  $(this).removeClass('btn-success');
  $(this).addClass('btn-danger');
  $(this).html('desactivado');
  $(this).attr('estadofactura',1);
}else{
   $(this).removeClass('btn-danger');
   $(this).addClass('btn-success');
   $(this).html('activado');
   $(this).attr('estadofactura',0);

}



});



/*=============================================
DEVOLUCION DE VENTAS
=============================================*/


/*$(".devolucionFactura").click(function(){

    var idfactura=$(this).attr("iddevFactura");

    
    var datos= new FormData();
    datos.append("iddevFactura",idfactura);

    //console.log('valor ='+ idProveedores);

    $.ajax({
        url:"ajax/ventas.ajax.php?op=devolucion&id_user="+idfactura,
            method:'POST',
           cache:false,
           data:datos,
           contenttype:false,
           processData:false,
           Datatype:"json",
           success: function(respuesta){
                    
            var res = JSON.parse(respuesta);
            console.log('respuesta',res);
            
            
            $("#idfactura").val(res.id_factura);
            $("#codigofactura").val(res.cod_factura);
            $("#nombreCliente").val(res.nombre);
            $("#apellidoCliente").val(res.apellido);
           $("#descripcionProducto").val(res.descripcion);
           console.log(res);
           }
     });
  });*/


  
  
  $('.devolucionFactura').click(function(){

    var iddevFactura= $(this).attr("iddevFactura");
    
  
      window.location="index.php?ruta=crear-devoluciones&idFactura="+iddevFactura;
  
  
  
  });


  $('.devolucionStock').click(function(){

    var idstokFactura=$(this).attr("idstokFactura");

    window.location="index.php?ruta=crear-devostock&idFactura="+idstokFactura;

  });

  

        
