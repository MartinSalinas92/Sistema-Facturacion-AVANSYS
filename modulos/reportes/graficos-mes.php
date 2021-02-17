<?php
if(!empty($_GET['fechaInicialporMes'])){
  $fechaInicial=$_GET['fechaInicialporMes'];
  $fechaFinal=$_GET['fechaFinalporMes']; 
  $item= null;
  $valor= null;
  $respuestaporMes=ControladorVenta::ctrMostrarVentasporFecha($item,$valor,$fechaInicial,$fechaFinal);
  var_dump($respuestaporMes);

  $Meses=null;
  foreach($respuestaporMes as $value){
      $Meses .= '{y:"'.$value['mes'].'", ventas: '.$value['total'].'},';
  // $var = array_push($arrayfechas, $fecha);       
  }
  $Meses = substr($Meses,0,-1);
}else{
    $fechaInicial=null;
    //var_dump($fechaInicial);
    $fechaFinal=null; 
    $item= null;
    $valor= null;
    $respuesta=ControladorVenta::ctrMostrarVentasporFecha($item, $valor,$fechaInicial,$fechaFinal);
   // var_dump($respuesta);
    $arrayfechas= array();
    $Meses=null;
    foreach ($respuesta as $value){
        $Meses .= '{y:"'.$value['mes'].'", ventas: '.$value['total'].'},';
    // $var = array_push($arrayfechas, $fecha);       
    }
    $Meses = substr($Meses,0,-1);

}
  ?>


<!--=============================================
RANGO DE VENTAS
=============================================-->

<div class="box box-solid bg-teal-gradient"> 
    <div class="box-header"> 
        <i class="fa fa-th"></i>
            <h3 class="box-title"> Grafico de Ventas por mes</h3>
    </div>
        <div class="box-body border-radius- nuevoGraficoVentas">

            <div class="chart" id="bar-chart-ventass" style="height: 250px;"></div> 
        
        </div>

</div>

<script> 

var line = new Morris.Bar({
      element: 'bar-chart-ventass',
      resize: true,
      data: [<?php echo $Meses;?>      
       // {y: '2019-12-29', ventas: 2666},
        // {y: '2020-01-09', ventas: 10000},
],
      xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['ventas'],
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



