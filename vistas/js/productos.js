


/*=============================================
AGREGANDO PRECIO DE VENTA
=============================================*/
$("#nuevaPrecioCompra").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(".nuevoPorcentaje").val();
		
		var porcentaje = Number(($("#nuevaPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevaPrecioCompra").val());

		var editarPorcentaje = Number(($("#EditarPrecioCompra").val()*valorPorcentaje/100))+Number($("#EditarPrecioCompra").val());

		$("#nuevaPrecioVenta").val(porcentaje);
		$("#nuevaPrecioVenta").prop("readonly",true);

		$("#EditarPrecioCompra").val(editarPorcentaje);
		$("#EditarPrecioCompra").prop("readonly",true);

	}

})

/*=============================================
CAMBIO DE PORCENTAJE
=============================================*/
$(".nuevoPorcentaje").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(this).val();
		
		var porcentaje = Number(($("#nuevaPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevaPrecioCompra").val());

		var editarPorcentaje = Number(($("#EditarPrecioCompra").val()*valorPorcentaje/100))+Number($("#EditarPrecioCompra").val());

		$("#nuevaPrecioVenta").val(porcentaje);
		$("#nuevaPrecioVenta").prop("readonly",true);

		$("#EditarPrecioCompra").val(editarPorcentaje);
		$("#EditarPrecioCompra").prop("readonly",true);

	}

})

$(".porcentaje").on("ifUnchecked",function(){

	$("#nuevaPrecioVenta").prop("readonly",false);
	$("#EditarPrecioVenta").prop("readonly",false);

})

$(".porcentaje").on("ifChecked",function(){

	$("#nuevaPrecioVenta").prop("readonly",true);
	$("#EditarPrecioVenta").prop("readonly",true);

})


function precioVenta(){

	if($(".porcentajess").prop("checked")){

		var valorPorcentaje = Number($("#porcentaje").val());
		var porcentaje = Number(($("#EditarPrecioCompra").val()*valorPorcentaje/100))+Number($("#EditarPrecioCompra").val());
		$("#EditarPrecioVenta").val(porcentaje);

	}else{
	}
}
/*=============================================
AGREGANDO  CODIGO DE PRODUCTO
=============================================*/

function code(){
	var inputCode = $("#nuevoCodigo");
	$.post('ajax/productos.ajax.php?op=ultimocode',function(r){
		res = JSON.parse(r);
		var newcode = parseInt(res.codigo) + 1;
		console.log(newcode);
		inputCode.val(newcode);
	});
}


code();

/*=============================================
AGREGANDO IMAGEN DE  PRODUCTO
=============================================*/

/*=============================================
	SUBIR FOTOS DEL PRODUCTO
    =============================================*/
    
    $(".newImagen").change(function(){
        var imagen= this.files[0];

        /*=============================================
	VALIDAMOS EL FORMATO IMAGEN QUE SEA JPG O PNG
    =============================================*/

    if(imagen["type"] !="image/jpeg" && imagen["type"] !="image/png"){

        $(".newImagen"). val("");

        swal({

            type: "error al subir fotos",
            title: "¡La imagen debe estar en formato JPG o PNG!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

        });

    }else if (imagen["size"] >2000000){
        $(".newImagen"). val("");

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


	
/*=============================================
EDITAR PRODUCTO
=============================================*/
	

	function editp(id){
		console.log('datos');		
		var idProducto= id;

		console.log(idProducto);
 
		var datos= new FormData();
		datos.append("idProductoss", idProducto);
		$.ajax({
			url:"ajax/productos.ajax.php?op=editar&id_user="+idProducto,
			cache:false,
			contenttype:false,
			processData:false,
			Datatype:"json",
			success:function(respuesta){
				res = JSON.parse(respuesta);
			   console.log('respuesta',res.imagen);
			   $("#idProductos").val(res.id_producto);
			   $("#EditarNombreProducto").val(res.nombre);
			   $("#EditarDescripcion").val(res.descripcion);
			   $("#EditarCodigo").val(res.codigo);
			   $("#EditarPrecioCompra").val(res.precio_compra);
			   $("#EditarPrecioVenta").val(res.precio_venta);
			   $("#editarStock").val(res.stock);
			   $("#idMarca").val(res.marca_id);
			   $("#idCategoria").val(res.categoria_id);
			   
			   
			   
                if(res.imagen != null){
				console.log('existe'+res.imagen);
				$("#fotoActual").val(res.imagen);
				$(".previsualizar").attr("src",res.imagen);
			 }else{
				$("#fotoActual").val("");
				$(".previsualizar").attr("src",res['imagen']);
				console.log('no existe'+res.imagen);
			 }
				   
		
			}
	 
			   });
			}

			/*=============================================
ACTIVAR PRODUCTO
=============================================*/

$(document).on("click", ".btnActivarProducto", function(){

	var idProducto = $(this).attr("idProductos");
    var estadoProducto = $(this).attr("estadoProductos");
    //solicitar que ajax haga la modificacion en la base de datos

    var datos = new FormData();
     datos.append("activarId", idProducto);
      datos.append("activarProducto", estadoProducto);

     $.ajax({
        url:'ajax/productos.ajax.php?op=activar&id_user='+idProducto+'&estado='+estadoProducto,
         method:"POST",
         data:datos,
         cache:false,
         contenttype:false,
         processData:false,
         success:function(respuesta){
        

         }



	 })
	 if(estadoProducto==0){
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('desactivado');
		$(this).attr('estadoProductos',1);
	}else{
	   $(this).removeClass('btn-danger');
	   $(this).addClass('btn-success');
	   $(this).html('activado');
	   $(this).attr('estadoProductos',0);

	}



});
		
	
	
