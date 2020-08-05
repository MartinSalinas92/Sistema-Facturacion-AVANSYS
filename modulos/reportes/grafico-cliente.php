<?php 

$clientes=ControladorVenta::ctrMostrarClientesFrecuentes();

$destacado= null;
foreach($clientes as $value){
    $destacado.='{y:"'.$value['nombre'].$value['apellido'].'", cantidad:'.$value['total_cantidad'].'},';
}


?>



<div class="box box-primary " style='background:rgb(245,194,87)'> 
    <div class="box-header"> 
        <i class="fa fa-th"></i>
            <h3 class="box-title"> Grafico de clientes</h3>
    </div>
        <div class="box-body">

            <div class="chart" id="bar-chart-clientes" style="height: 250px;"></div> 
        
        </div>

</div>

<script> 
var chart = new Morris.Bar({
      element: 'bar-chart-clientes',
      resize: true,
      data:  [   
          <?php 
            echo $destacado;
            ?>  
         //{y: '2019-12-29', b: 2666},
         //{y: '2020-01-09', b: 10000},
],
      xkey             : 'y',
    ykeys            : ['cantidad'],
    labels           : ['cantidad'],
    lineColors       : ['#000000'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#000000',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: '#800080',
    gridLineColor    : '#800080',
    gridTextFamily   : 'Open Sans',
    preUnits         : '',
    gridTextSize     : 10,
    backgroundColor  :'rgb(245,194,87)',


    });
</script>