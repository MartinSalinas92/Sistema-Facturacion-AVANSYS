 <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DETALLE DE DEVOLUCIONES
      
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
                
               
                <th>Descripcion del Producto</th>
                <th>Cantidad</th> 
              
             
                
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
            <?php
            
            if(isset($_GET['idDevolucion'])){
              $valor=$_GET['idDevolucion'];
              $respuesta=Controladordevoluciones::mostrarDetalleDevoluciones($valor);

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
                
                
                
              </tr>  
                ';


            }
            }
            
            
            
            ?>
            
            

            
            
            
            </tbody>
          
          
          </table>

        </div>
        
       
      </div>
      

    </section>
    
  </div>
  