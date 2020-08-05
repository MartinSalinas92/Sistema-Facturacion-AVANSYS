<?php  

$item1=null;
$valor=null;
$item="factura";

$factura=ControladorVenta::totalPrecios($item);

//var_dump($factura);
$productos=ControladorProductos::ctrMostrarProductos($item1,$valor);

$totalProductos=count($productos);
//var_dump($totalProductos);

$respuesta= ControladorClientes::ctrMostrarClientes($item1,$valor);

$totalClientes=count($respuesta);

?>



<div  class="col-lg-3 col-xs-6">

  <div style="padding:1em 0;" class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3>$<?php echo number_format($factura["total"],2); ?></h3>

      <p>total de ventas</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="ventas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>



<div class="col-lg-3 col-xs-6">

  <div style="padding:1em 0;" class="small-box bg-red">
  
    <div class="inner">
    
      <h3><?php echo number_format($totalProductos) ?></h3>

      <p>Productos</p>
    
    </div>
    
    <div class="icon">
      
      <i class="fa fa-product-hunt"></i>
    
    </div>
    
    <a href="productos" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div style="padding:1em 0;" class="small-box bg-yellow">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalClientes) ?></h3>

      <p>Clientes</p>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-add"></i>
    
    </div>
    
    <a href="clientes" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">

    <a href="" class="small-box-footer">
      
      HORA <i class="fa fa-arrow-circle-right"></i>
    
    </a>
    <div style="text-align:center;padding:1em 0;"> <h4><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3435910"><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=small&timezone=America%2FArgentina%2FBuenos_Aires" width="100%" height="82" frameborder="0" seamless></iframe> </div>
      

      </div>
    
    
    </div>