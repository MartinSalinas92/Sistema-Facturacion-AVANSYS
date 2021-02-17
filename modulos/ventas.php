
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ventas
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar Ventas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <a href="crear-ventas"> 
          <button class="btn btn-primary" >
          
            <i class="fa fa-plus-square" aria-hidden="true"></i>
          
          
          </button>
          </a>
          <button type="button" class="btn btn-default pull-right" id="daterange-btn">
            <span> 
              <i class="fa fa-calendar"></i> Rango de Fechas
            </span>
              <i class="fa fa-caret-down"></i>

          </button> 
       
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th>Codigo </th> 
                <th>Fecha</th> 
                <th>tipo_factura</th> 
                <th>Codigo_factura </th> 
                <th>Tipo_Pago</th> 
                <th>Total_general</th> 
                <th>Vendedor</th> 
                <th>Cliente </th> 
                <th>Acciones </th> 
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
            
              <tr>
                <?php
                if(isset($_GET['fechaInicial'])){
                $fechaInicial=$_GET['fechaInicial'];
                $fechaFinal=$_GET['fechaFinal']; 
                $item= null;
                $valor= null;
                $respuesta=ControladorVenta::ctrMostrarVentas($item, $valor,$fechaInicial,$fechaFinal);

                
                

                //$respuesta1=ControladorVenta::ctrMostrardetalles($item1);

                //var_dump($respuesta1);
                foreach ($respuesta as $value) {

                  echo '
                  <tr>
                    <td>'.$value['id_factura'].' </td>
                    <td>'.$value['fecha'].' </td>
                    <td>'.$value['tipo_factura'].' </td>
                    <td>'.$value['codigo_factura'].'</td>
                    <td>'.$value['tipo_pago'].'</td>
                    <td>'.number_format($value['total_general'],2).'</td>';


                    $itemUsuario = "id_usuario";
                    $valorUsuario = $value["usuario_id"];
  
                    $respuestaUsuario = ControladorUsuarios::mostrarUsuarios($itemUsuario,$valorUsuario);
  
                    echo '<td>'.$respuestaUsuario["nombre"].'</td>';

                    $itemCliente = "id_cliente";
                    $valorCliente = $value["cliente_id"];
  
                    $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente,$valorCliente);
  
                    echo '<td>'.$respuestaCliente["nombre"].'</td>';

                   echo '<td>

                    <div class="btn-group">
                        
                      <button class="btn btn-info btnImprimirFactura"  codigo_venta='.$value['codigo_factura'].'>

                        <i class="fa fa-print"></i>

                      </button>


                    

                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>';

                   // }

                    echo '</div>  

                  </td>
  
                    
  
                  
                  
                
                  
                  </tr>';

                  
                }
                
              }else{
                
                $fechaInicial=null;
                $fechaFinal=null;
                $item=null;
                $valor=null;
                $respuesta=ControladorVenta::ctrMostrarVentasss($item,$valor,$fechaInicial,$fechaFinal);
                foreach ($respuesta as $value) {

                  echo '
                  <tr>
                    <td>'.$value['id_factura'].' </td>
                    <td>'.$value['fecha'].' </td>
                    <td>'.$value['tipo_factura'].' </td>
                    <td>'.$value['codigo_factura'].'</td>
                    <td>'.$value['tipo_pago'].'</td>
                    <td>'.$value['total_general'].'</td>';


                    $itemUsuario = "id_usuario";
                    $valorUsuario = $value["usuario_id"];
  
                    $respuestaUsuario = ControladorUsuarios::mostrarUsuarios($itemUsuario,$valorUsuario);
  
                    echo '<td>'.$respuestaUsuario["nombre"].'</td>';

                    $itemCliente = "id_cliente";
                    $valorCliente = $value["cliente_id"];
  
                    $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente,$valorCliente);
  
                    echo '<td>'.$respuestaCliente["nombre"].'</td>';

                   echo '<td>

                    <div class="btn-group">
                        
                      <button class="btn btn-info btnImprimirFactura"  codigo_venta='.$value['codigo_factura'].'>

                        <i class="fa fa-print"></i>

                      </button>


                    

                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>';

                   // }

                    echo '</div>  

                  </td>
  
                    
  
                  
                  
                  
                  </tr>';
              }
            }
                
                
                ?>
            
            
            
            </tbody>
          
          
          </table>

        </div>
        
       
      </div>
      

    </section>

    </div>
    
  