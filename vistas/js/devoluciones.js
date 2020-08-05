/*=============================================
IMPRIMIR DEVOLUCIONES
=============================================*/
$('.tablas').on('click',".btnImprimirDevoluciones", function(){

    var idproducto= $(this).attr("id_producto");
 
    window.open("extensiones/tcpdf/pdf/devolucionesimpresion.php?id_user="+idproducto, "_blank");
 
 });


