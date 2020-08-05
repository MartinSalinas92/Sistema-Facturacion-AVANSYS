<?php




if(isset($_GET['fechaInicial'])){
    $fechaInicial=$_GET['fechaInicial'];
    $fechaFinal=$_GET['fechaFinal']; 
    $item= null;
    $valor= null;
    $respuesta=ControladorVenta::ctrMostrarVentasss($item, $valor,$fechaInicial,$fechaFinal);

   // var_dump($respuesta);
    
    $arrayfechas= array();
    $fecha=null;
    foreach ($respuesta as $value){
        $fecha .= '{y:"'.$value['fecha'].'", ventas: '.$value['total_general'].'},';
    // $var = array_push($arrayfechas, $fecha); 
  
    }
    //capturamos solo año, mes y dia
    $arrayfechas = substr($fecha,0,-1);
    //var_dump($arrayfechas);


    

}else{
    $fechaInicial=null;
    $fechaFinal=null; 
    $item= null;
    $valor= null;
    $respuesta=ControladorVenta::ctrMostrarVentasReportess($item,$valor,$fechaInicial,$fechaFinal);
    

    $fecha=null;
    foreach ($respuesta as $value){
        $fecha .= '{y:"'.$value['Mes'].'", ventas: '.$value['Total'].'},';
    // $var = array_push($arrayfechas, $fecha);       
    }
    $fecha = substr($fecha,0,-1);
    //var_dump($fecha);


}


  



?>

<!--=============================================
RANGO DE VENTAS
=============================================-->

<div class="box box-solid bg-teal-gradient"> 
    <div class="box-header"> 
        <i class="fa fa-th"></i>
            <h3 class="box-title"> Grafico de Ventas </h3>
    </div>
        <div class="box-body border-radius- nuevoGraficoVentas">

            <div class="chart" id="bar-chart-ventas" style="height: 250px;"></div> 
        
        </div>

</div>

<script> 

var line = new Morris.Bar({
      element: 'bar-chart-ventas',
      resize: true,
      data: [<?php echo $fecha;?>      
       // {y: '2019-12-29', ventas: 2666},
        // {y: '2020-01-09', ventas: 10000},
],
      xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['ventas'],
    lineColors       : ['#000000'],
    lineWidth        : 2,
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

