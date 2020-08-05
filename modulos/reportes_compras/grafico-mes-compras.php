<?php

$fechaInicial=null;
 $fechaFinal=null; 
 $item= null;
 $valor= null;

$respuesta=ControladorCompra::ctrmostrarCompraMes($fechaInicial,$fechaFinal,$item,$valor);
//var_dump($respuesta);

$arrayfechas= array();
$Meses=null;
foreach ($respuesta as $value){
    $Meses .= '{y:"'.$value['mes'].'", compras: '.$value['total_compra'].'},';
// $var = array_push($arrayfechas, $fecha);       
}
$Meses = substr($Meses,0,-1);

?>

<!--=============================================
RANGO DE VENTAS
=============================================-->

<div class="box box-solid bg-teal-gradient"> 
    <div class="box-header"> 
        <i class="fa fa-th"></i>
            <h3 class="box-title"> Grafico de Compras por mes</h3>
    </div>
        <div class="box-body border-radius- nuevoGraficoCompras">

            <div class="chart" id="bar-chart-comprass" style="height: 250px;"></div> 
        
        </div>

</div>

<script> 

var line = new Morris.Bar({
      element: 'bar-chart-comprass',
      resize: true,
      data: [<?php echo $Meses;?>      
       // {y: '2019-12-29', ventas: 2666},
        // {y: '2020-01-09', ventas: 10000},
],
      xkey             : 'y',
    ykeys            : ['compras'],
    labels           : ['compras'],
    lineColors       : ['#000000'],
    lineWidth        : 4,
    hideHover        : 'auto',
    gridTextColor    : '#000000',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : '$',
    gridTextSize     : 10

    
});

</script>