<?php
 
 $vendedores=ControladorVenta::ctrMostrarVendedores();
//var_dump($vendedores);

$destacados=null;
foreach($vendedores as $value){
    $destacados .='{y:"'.$value['nombre'].'", ventas:'.$value['total_cantidad'].'},';
}
?>







<div class="box box-success " style='background:rgb(245,194,87)'> 
    <div class="box-header"> 
        <i class="fa fa-th"></i>
            <h3 class="box-title"> Grafico de vendedores con mas ventas generadas</h3>
    </div>
        <div class="box-body">

            <div class="chart" id="bar-chart-vendedores" style="height: 250px;"></div> 
        
        </div>

</div>

<script> 
var chart = new Morris.Bar({
      element: 'bar-chart-vendedores',
      resize: true,
      data:  [  
          <?php 
          echo $destacados;
          ?>   
         //{y: '2019-12-29', b: 2666},
         //{y: '2020-01-09', b: 10000},
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
    pointStrokeColors: '#800080',
    gridLineColor    : '#800080',
    gridTextFamily   : 'Open Sans',
    preUnits         : '$',
    gridTextSize     : 10,
    backgroundColor  :'rgb(245,194,87)',


    });


</script>



