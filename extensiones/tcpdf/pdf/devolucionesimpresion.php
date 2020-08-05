<?php



require_once "../../../controlladores/devoluciones.controlador.php";
require_once "../../../modelos/devoluciones.modelo.php";

require_once "../../../controlladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controlladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php"
;
require_once "../../../controlladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";



class ImprimirFactura{
public function traerImpresionDevoluciones(){

        $item='producto_id';
        $valor=$_GET['id_user'];

        $devoluciones=Controladordevoluciones::crtmostrarDevoluciones($item,$valor);
        var_dump($devoluciones);
        $devoluciones['cliente_id'];



    }
}


require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

<table> 
    <tr>
        <td style="width:150px"><img src="images/color_logo_black.png"></td>
            <td style="background-color:white; width:140px">
                <div style="font-size:8.5px; text-align:right; line-height:10px;"> 
                <br>
                CUIT: 71.759.963-9

                <br>
                Dirección: Calle 44B 92-11
                
                </div>
            </td>
            
			<td style="background-color:white; width:140px">

            <div style="font-size:8.5px; text-align:right; line-height:10px;">
                
                <br>
                Teléfono: 3794148968
                
                <br>
                ventas@inventorysystem.com

            </div>
            
        </td>
        <td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FECHA<br>$devoluciones</td>

    
    
    
    </tr>

</table>

EOF;

$pdf->writeHTML($bloque1,false,false,false,false, '');



$bloque3 = 

'<table style="font-size:10px; padding:5px 10px;">

<tr>
        
<td style="width:540px"><img src="images/back.jpg"></td>

</tr>
<thead>
    <tr>
        <th style="border: 1px solid #666; background-color:white; width:150px; text-align:center">Vendedor</th>
        <th style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Cliente</th>
        <th style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Producto</th>
       
    </tr>
</thead>
<tbody>';

    $bloque3 .= '<tr>
                    <td style="border: 1px solid #666; color:#333; background-color:white; width:150px; text-align:center">
                '.$Vendedor.'
            </td>

            <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
                '.$Cliente.'
            </td>

            <td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
                '.$producto.'
            </td>
  
    </tr>';

'</tbody>

</table>';

$pdf->writeHTML($bloque3,false,false,false,false, '');








//SALIDA DEL ARCHIVO
ob_end_clean();
$pdf->Output('devolucionesimpresion.pdf');








if(isset( $_GET['id_user'] )){

    
$factura= new ImprimirFactura();
$factura->traerImpresionDevoluciones()
;

}

?>