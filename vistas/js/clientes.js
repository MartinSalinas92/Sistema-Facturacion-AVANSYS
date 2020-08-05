 /*=============================================
EDITAR CLIENTES
=============================================*/
function editar(id_persona){
   var  idClientes = id_persona;
   console.log(idClientes);
   $.ajax({
    url:"ajax/clientes.ajax.php?op=editar&id_user="+idClientes,
        method:'POST',
       cache:false,
       data:false,
       contenttype:false,
       processData:false,
       Datatype:"json",
       success: function(respuesta){            
        var respuesta = JSON.parse(respuesta);
        console.log(respuesta); 
        $("#idCliente").val(respuesta.id_persona);
        $("#editarNombre").val(respuesta.nombre);
        $("#editarApellido").val(respuesta.apellido);
        $("#editarDNI").val(respuesta.dni);
        $("#EditarLocalidad").val(respuesta.localidad);
        $("#idDireccion").val(respuesta.id_direccion);
        $("#EditarDireccion").val(respuesta.direccion);
        $("#editarCalle").val(respuesta.nombre_calle);
        $("#editarnumerodeCalle").val(respuesta.numero_calle);
        $("#editarnumerodeCasa").val(respuesta.numero_casa);
        $("#editarNUevoDepartamento").val(respuesta.piso_departamento);
        

    
       
       }


});

}


