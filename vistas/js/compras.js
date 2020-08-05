
/*=============================================
RANGO DE FECHAS
=============================================*/


$('#daterange-btn-Compras').daterangepicker(
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
      $('#daterange-btn-Compras span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  
      var fechaInicial = start.format('YYYY-MM-DD');
  
      var fechaFinal = end.format('YYYY-MM-DD');
  
      var capturarRango = $("#daterange-btn-Compras span").html();
     
         localStorage.setItem("capturarRango", capturarRango);
  
         window.location = "index.php?ruta=compras&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
  
    }
  
  );

   /*=============================================
VARIABLE LOCALSTORAGE
=============================================*/
if(localStorage.getItem("capturarRango") != null){
  $('#daterange-btn-Compras span').html(localStorage.getItem("capturarRango"));
}else{
  $('#daterange-btn-Compras span').html('<i class="fa fa-calendar"></i> Rango de Fechas');
}

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "compras";
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

    	window.location = "index.php?ruta=compras&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}


})

 /*=============================================
MOSTRAR LOS DETALLES
=============================================*/

$('.btnImprimirCompra').click(function(){

	var idCompra= $(this).attr("idcompra");

	window.location="index.php?ruta=detalle&idCompra="+idCompra;



});

/*=============================================
ANULAR COMPRA
=============================================*/

$(document).on("click",".btnActivarCompra", function(){

	var idCompras=$(this).attr("idCompra");
	var estadoCompra=$(this).attr("estadoCompra");

	var datos= new FormData();

	datos.append("activarId", idCompras);
	datos.append("activarCompra", estadoCompra);

	$.ajax({
		url:'ajax/compras.ajax.php?op=activar&id_user='+idCompras+'&estado='+estadoCompra,
		 method:"POST",
		 data:datos,
		 cache:false,
		 contenttype:false,
		 processData:false,
		 success:function(respuesta){
		
	
		 }
	
	
	
	

})
if(estadoCompra==0){
	$(this).removeClass('btn-success');
	$(this).addClass('btn-danger');
	$(this).html('desactivado');
	$(this).attr('estadoCompra',1);
  }else{
	 $(this).removeClass('btn-danger');
	 $(this).addClass('btn-success');
	 $(this).html('activado');
	 $(this).attr('estadoCompra',0);
  
  }


});