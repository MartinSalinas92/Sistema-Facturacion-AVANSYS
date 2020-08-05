
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DETALLE DE COMPRAS
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar DETALLES</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
         
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
              <tr> 
                
               
                <th>Descripcion</th>
                <th>Cantidad</th> 
                <th>Precio</th>   
                <th>Subtotal</th>
             
                
              
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
            
            

            <?php 
            
            
            if(isset($_GET['idCompra'])){
              $valor=$_GET['idCompra'];
             $respuesta= ControladorCompra::ctrMostrarDetalles($valor);
             //var_dump($respuesta);

             foreach ($respuesta as $res) {
                $item='id_producto';
                $value=json_decode($res["producto_id"], true);
                $Mostrarproductos=ControladorProductos::ctrMostrarProductos($item,$value);
               // var_dump($Mostrarproductos);


              echo '
            <tr>
                
  
                <td>'.$Mostrarproductos['descripcion'].'</td>
                <td>'.$res['cantidad'].'</td>
                <td>'.$res['precio'].'</td>
                <td>'.number_format($res['subtotal'],2).'</td>
                
                </tr>';
              }
            }
                
                
                $item= 'id_compra';
                $valor= $_GET['idCompra'];
               
               $respuesta=ControladorCompra::ctrMostrarComprasDetalles($item,$valor);
               // var_dump($respuesta);

                $totalGeneral=$respuesta['total_general'];
                


                echo'
                
                
            <div class="col-xs-8 pull-right">
              
         

              <thead>

                <tr>
                  
                  <th>Total</th>      
                </tr>

              </thead>

              <tbody>
              
                <tr>
                
                  </td>
                  <td style="width: 50%"> 
                  '.$totalGeneral.'
                  </td>
            ';

           

            
            
            
            ?>
            
            
            </tbody>
          
          
          </table>

        </div>
        
       
      </div>
      

    </section>
    
  </div>
  