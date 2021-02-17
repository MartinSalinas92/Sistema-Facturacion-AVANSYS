<?php


require_once "../../../controlladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controlladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controlladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php"
;
require_once "../../../controlladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";



class ImprimirFactura{


public function traerImpresionFactura(){
    $fechaInicial=null;
    $fechaFinal=null;
    $itemVenta='codigo_factura';
    $valorVenta=$_GET['id_user'];

    $resultado=ControladorVenta::ctrMostrarVentas($itemVenta,$valorVenta,$fechaInicial,$fechaFinal);

    //var_dump($resultado);
    $id=($resultado['id_factura']);

    $fecha=$resultado['fecha'];
    $tipo_factura=($resultado['tipo_factura']);
    $tipo_pago=($resultado['tipo_pago']);
    $total_general=$resultado['total_general'];
    $impuesto=number_format($resultado['impuesto']);

    //$productos = json_decode($resultado['producto_id']);

    //TRAEMOS INFORMACION DEL CLIENTE

    $item='id_cliente';
    $itemValor=$resultado['cliente_id'];
    $respuestaCliente=ControladorClientes::ctrMostrarClientes($item,$itemValor);
    


    //TRAEMOS INFORMACION DEL VENDEDOR

    $item='id_usuario';
    $itemValor=$resultado['usuario_id'];
    $resultadoVendedor=ControladorUsuarios::mostrarUsuarios($item,$itemValor);


    $item1=$resultado['id_factura'];
   $resultadofactura=ControladorVenta::ctrMostrardetalles($item1);

    //var_dump($resultadofactura);
    //detalle_factura
   
    $item2=$id;
    

    $resultadoDetalle=ControladorVenta::ctrMostrardetalles($item2);
     var_dump($resultadoDetalle);

    //  $cantidad=$resultadoDetalle["cantidad"];
    // $precio=number_format($resultadoDetalle['precio'],2);
    // $descuento=number_format($resultadoDetalle['descuento'],2);
    // $interes=number_format($resultadoDetalle['interes'],2);
    // $subTotal=number_format($resultadoDetalle['subTotal'],2);

    $impuestoIva=$impuesto*$total_general/100;
    


  




require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

<table> 
    <tr>
        <td style="width:150px"><img src="images/Hebreos.jpg"></td>
            <td style="background-color:white; width:140px">
                <div style="font-size:8.5px; text-align:right; line-height:10px;"> 
                <br>
                    <span>Rodrigo David Acosta Florentin </span>

                <br>
                <br>
                CUIT: 24-34598692-4

                <br>
                Dirección: Glogieri 1790
            

                3600-FORMOSA
                
                </div>
            </td>
            
			<td style="background-color:white; width:140px">

            <div style="font-size:8.5px; text-align:right; line-height:10px;">
                
                <br>
                Teléfono: 3704943172
                
                <br>
                    rodrigoflorentin439@gmail.com

            </div>
            
        </td>
        <td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FACTURA $tipo_factura.<br>$valorVenta</td>

    
    
    
    </tr>

</table>

EOF;

$pdf->writeHTML($bloque1,false,false,false,false, '');


// ---------------------------------------------------------

$bloque2 = <<<EOF
    '<table>
		
    <tr>
        
        <td style="width:540px"><img src="images/back.jpg"></td>
    
    </tr>

</table>
<table style="font-size:10px; padding: 5px 10px;">
    <tr>
		
        <td style="border: 1px solid #666; background-color:white; width:540px">Vendedor: $resultadoVendedor[nombre]</td>

    </tr>
    <tr> 
                <td style="border: 1px solid #666; background-color:white; width:390px">

                     Cliente: $respuestaCliente[nombre]

                </td>
                <td style="border: 1px solid #666; background-color:white; width:75px">

                     DNI: $respuestaCliente[dni]

                </td>

                 <td style="border: 1px solid #666; background-color:white; width:75px; text-align:right">
    
                     Fecha: $fecha

                </td>
        
        
        
    </tr>
    <tr>
		
    <td style="border: 1px solid #666; background-color:white; width:540px">Tipo_pago: $tipo_pago</td>

</tr>
       
    
    
    
    </table>'


EOF;
$pdf->writeHTML($bloque2,false,false,false,false, '');

$bloque3 = 

'<table style="font-size:10px; padding:5px 10px;">

<tr>
        
<td style="width:540px"><img src="images/back.jpg"></td>

</tr>
<thead>
    <tr>
        <th style="border: 1px solid #666; background-color:white; width:150px; text-align:center">Producto</th>
        <th style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Cantidad</th>
        <th style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Descuento</th>
        <th style="border: 1px solid #666; background-color:white; width:70px; text-align:center">Interes</th>
        <th style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Precio</th>
        <th style="border: 1px solid #666; background-color:white; width:70px; text-align:center">SubTotal</th>
    </tr>
</thead>
<tbody>';
foreach ($resultadoDetalle as $res) {
    $item='id_producto';
    $value=json_decode($res["producto_id"], true);
    $Mostrarproductos=ControladorProductos::ctrMostrarProductos($item,$value);
    $bloque3 .= '<tr>
                    <td style="border: 1px solid #666; color:#333; background-color:white; width:150px; text-align:center">
                '.$Mostrarproductos["nombre"].'
            </td>

            <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
                '.$res["cantidad"].'
            </td>

            <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$ 
                '.$res["descuento"].'
            </td>

            <td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">$ 
                '.$res["interes"].'
            </td>
            <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$ 
                '.$res["precio"].'
            </td>
            <td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">$ 
                '.number_format($res["subTotal"],2).'
            </td>    
    </tr>';
}
'</tbody>

</table>';

$pdf->writeHTML($bloque3,false,false,false,false, '');

// ---------------------------------------------------------
//  $item='id_producto';
// $value=json_decode($resultadoDetalle[0]["producto_id"], true);


// $Mostrarproductos=ControladorProductos::ctrMostrarProductos($item,$value);
// //var_dump($Mostrarproductos);
// $bloque4 =<<<EOF
        
// 	<table style="font-size:10px; padding:5px 10px;">
// EOF; 
// $var= 0;
// foreach($resultadoDetalle as $res){ 
//     <<<EOF
//     '
//         <tr>
            
//             <td style="border: 1px solid #666; color:#333; background-color:white; width:150px; text-align:center">
//                 $Mostrarproductos[nombre]
//             </td>

//             <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
//                 $res[1]
//             </td>

//             <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$ 
//                 $res[descuento]
//             </td>

//             <td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">$ 
//                 $res[interes]
//             </td>
//             <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$ 
//                 $res[precio]
//             </td>
//             <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$ 
//                 $res[subTotal]
//             </td>

//         </tr>
//     ' 

// EOF;
// //  var_dump($var++);        
// }
//         <<<EOF
// </table>

  

// EOF;
// $pdf->writeHTML($bloque4,false,false,false,false, '');


// ---------------------------------------------------------

$bloque5 = '

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>


		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				IVA: '.$impuesto.' %
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
            '.number_format($impuestoIva,2).'
			</td>

		</tr>
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Total: 
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				 '.$total_general.'
			</td>

		</tr>


	</table>

';

$pdf->writeHTML($bloque5, false, false, false, false, '');



    

//SALIDA DEL ARCHIVO
ob_end_clean();
$pdf->Output('factura.pdf');

}

}




if(isset( $_GET['id_user'] )){

    
$factura= new ImprimirFactura();
$factura->traerImpresionFactura()
;

}



?>